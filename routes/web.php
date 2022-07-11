<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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

Route::get('/', [PostController::class, 'index'])->name('home');

Route::controller(UserController::class)->group(function () {
    Route::get('register/', 'register')->name('register');
    Route::post('register/', 'registerForm');
    Route::get('login/', 'login')->name('login');
    Route::post('login/', 'loginForm');
    Route::get('logout/', 'logout');
});
