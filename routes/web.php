<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/about', function (){
   return view('about');
})->name('about');

Route::get('/contact', function (){
    return view('contact');
})->name('contact');

Route::get('/menu',[\App\Http\Controllers\RepasController::class,'index'])->name('menu');
Route::get('service',function(){
    return view('service');
})->name('service');

Route::get('/signin', [AuthController::class, 'index'])->name('signin');
Route::post('/signin', [AuthController::class, 'signin']);


Route::get('/signup', [AuthController::class, 'signup'])->name('signup');
Route::post('/signup', [AuthController::class, 'register'])->name('register');


Route::get('auth/google', [AuthController::class, 'redirect'])->name('auth.google');
Route::get('auth/google/callback', [AuthController::class, 'callback']);

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
