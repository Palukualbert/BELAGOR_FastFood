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

Route::get('/menu', function (){
    return view('menu');
})->name('menu');
Route::get('service',function(){
    return view('service');
})->name('service');
