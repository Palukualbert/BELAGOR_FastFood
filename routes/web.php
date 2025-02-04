<?php

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
