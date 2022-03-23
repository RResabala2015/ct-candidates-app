<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});

Route::resource('/new_task','App\Http\Controllers\NewTaskController');

Route::get('/new_task/{id}/confirmDelete', 'App\Http\Controllers\NewTaskController@confirmDelete');*/

Route::get('search/{data}', [App\Http\Controllers\NewTaskController::class, 'searchData']);


Route::get('{any}',function(){
    return view('app');
})->where('any','.*');