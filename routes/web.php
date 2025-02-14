<?php

use App\Http\Controllers\AdminController;
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
Route::post('/order/store', [\App\Http\Controllers\CommandeController::class, 'store'])->name('order.store');

/*----------------------------------------- PARTIE ADMINISTRATEUR -----------------------------------------*/

Route::prefix('admin')->group(function(){
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::resource('repas', RepasController::class)->except(['show']);
    Route::get('/add', [\App\Http\Controllers\RepasController::class, 'create'])->name('admin.add');
    Route::post('/store', [\App\Http\Controllers\RepasController::class, 'store'])->name('admin.store');
    Route::delete('/{repas}', [\App\Http\Controllers\RepasController::class, 'destroy'])->name('admin.destroy');

    Route::get('/edit/{repas}', [\App\Http\Controllers\RepasController::class, 'edit'])->name('admin.edit');
    Route::put('/{repas}', [\App\Http\Controllers\RepasController::class, 'update'])->name('admin.update');
});


