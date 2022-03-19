<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::view('/','index');
Route::get('dashboard',[App\Http\Controllers\PageController::class, 'dashboard'])
        ->middleware('auth:sanctum')
        ->name('dashboard');
Route::resource('items', App\Http\Controllers\ItemController::class)
        ->middleware('auth:sanctum');
