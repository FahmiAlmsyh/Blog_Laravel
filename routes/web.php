<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloController;

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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('Hellow', 'App\http\Controllers\HelloController@index');
// Route::get('Hola', [HelloController::class, 'style']);
// Route::resource('posts', PostController::class);

Route::get('login', [AuthController::class, 'login']);
Route::post('login', [AuthController::class, 'authenticate']);
Route::get('logout', [AuthController::class, 'logout']);
Route::get('register', [AuthController::class, 'register_form']);
Route::post('register', [AuthController::class, 'register']);

Route::get('posts', [PostController::class, 'index']);
Route::get('posts/create', [PostController::class, 'create']);
Route::get('posts/bin', [PostController::class, 'bin']);
Route::get('posts/{s}', [PostController::class, 'show']);
Route::post('posts', [PostController::class, 'store']);

Route::get('posts/{s}/edit', [PostController::class, 'edit']);
Route::patch('posts/{s}', [PostController::class, 'update']);
Route::delete('posts/{id}', [PostController::class, 'destroy']);




