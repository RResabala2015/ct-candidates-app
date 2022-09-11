<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UpdateRequest;
use App\Http\Requests\UserRequest;
use App\Repositories\AuthRepository;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Http\Request;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;
use PHPOpenSourceSaver\JWTAuth\Exceptions\JWTException;
use PHPOpenSourceSaver\JWTAuth\Exceptions\TokenExpiredException;
use PHPOpenSourceSaver\JWTAuth\Exceptions\TokenBlacklistedException;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTFactory;

class AuthController extends Controller
{

    protected $userservice;

    public function __construct(AuthRepository $userservice)
    {
        $this->userservice = $userservice;
    }

    public function register(UserRequest $request)
    {
        $validator = $request->all();

        //if has a remember_token save it in the database
        if ($request->has('remember_token')) {
            $remember_token = $request->remember_token;
        } else {
            $remember_token = null;
        }
        
        try {
            $user = $this->userservice->store($request->all(), $validator, $remember_token);
           
            return response()->json([
                'message' => 'User created successfully',
                'user' => $user
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'User not created',
                'error' => $e->getMessage()
            ], 500);
        }
      
    }

    public function login(LoginRequest $request)
    {
        // $validator = $request->validate([
        //     'email' => 'required|string|email|',
        //     'password' => 'required|string|min:4'
        // ]);
        $validator = $request->only(['email', 'password']);
        

        if (!Auth::attempt($validator)) {
            response()->json([
                'Message' => 'Credentials do not match!',
                'status' => 'error'
            ], 401);
        }

        $user = auth()->user()->only(['id', 'username', 'email']);

        return $this->createNewToken($user);
    }

    public function logout(Request $request)
    {
        $token = JWTAuth::getToken();

        try {
            $token = JWTAuth::invalidate($token);
            return response()->json([
                'success' => true, 'message' => "Sesión cerrada correctamente"
            ], 200);
        } catch (JWTException $e) {
            return response()->json([
                'success' => false, 'message' => 'Fallo al cerrar sesión'
            ], 422);
        }
    }



    protected function createNewToken($user)
    {
        $payload = JWTFactory::sub($user['id'])
            ->user($user)
            ->make();

        $reponse = JWTAuth::encode($payload);
        $reponse = $reponse->get();

        return response()->json([
            'access_token' => $reponse,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }

    public function refresh()
    {
        $token = JWTAuth::getToken();
        $token = JWTAuth::refresh($token);

        return response()->json([
            'success' => true,
            'token' => $token
        ], 200);
    }
}