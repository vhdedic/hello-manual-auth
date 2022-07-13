<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::controller(PostController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/posts/create', 'create')->name('posts.create');
    Route::post('/posts', 'store')->name('posts.store');
    Route::get('posts/{id}', 'show')->name('posts.show');
    Route::get('posts/{id}/edit', 'edit')->name('posts.edit');
    Route::put('posts/{id}/edit', 'update')->name('posts.update');
    Route::delete('posts/{id}', 'destroy')->name('posts.destroy');
});

Route::controller(UserController::class)->group(function () {
    Route::get('register/', 'register')->name('register');
    Route::post('register/', 'registerForm');
    Route::get('login/', 'login')->name('login');
    Route::post('login/', 'loginForm');
    Route::get('logout/', 'logout')->name('logout');
});
