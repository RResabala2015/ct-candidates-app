<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\AuthRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTFactory;

class AuthRepository implements AuthRepositoryInterface
{

    protected $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    //creating a user
    public function store($data, $validator, $remember_token)
    {
        $user = $this->user->create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'remember_token' => $remember_token
        ]);

        return $user;
    }
    
  
}