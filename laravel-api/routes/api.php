<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\TodoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('user')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
});

//protected routes
Route::group(['middleware' => 'jwt.verify'], function () {

    Route::get('/users', [AuthController::class, 'allUsers']);
     Route::put('user/update/{id}', [AuthController::class, 'update']);
    Route::get('user/profile' , [AuthController::class, 'profile']);
    Route::get('user/show/{id}', [AuthController::class, 'show']);
    Route::post('/user/logout', [AuthController::class, 'logout']);
    Route::get('/todos', [TodoController::class, 'all']);
    Route::get('todo/show/{id}', [TodoController::class, 'show']);
    Route::post('todo/create', [TodoController::class, 'store']);
    Route::put('todo/update/{id}', [TodoController::class, 'update']);
    Route::delete('todo/delete/{id}', [TodoController::class, 'destroy']);
});