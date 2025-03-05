<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\PanierRepasController;
use App\Http\Controllers\RepasController;
use App\Models\PanierRepas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

Route::post('/ajouter-au-panier', [PanierRepasController::class, 'ajouterRepas']);

Route::get('/mon-panier',[PanierController::class, 'index'])->name('monPanier');


Route::post('/valider-commande', [CommandeController::class, 'store'])->name('commande.valider');

/*----------------------------------------- PARTIE ADMINISTRATEUR -----------------------------------------*/

Route::prefix('admin')->group(function(){
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::resource('repas', RepasController::class)->except(['show']);
    Route::get('/add', [\App\Http\Controllers\RepasController::class, 'create'])->name('admin.add');
    Route::post('/store', [\App\Http\Controllers\RepasController::class, 'store'])->name('admin.store');
    Route::delete('/{repas}', [\App\Http\Controllers\RepasController::class, 'destroy'])->name('admin.destroy');

    Route::get('/edit/{repas}', [\App\Http\Controllers\RepasController::class, 'edit'])->name('admin.edit');
    Route::put('/{repas}', [\App\Http\Controllers\RepasController::class, 'update'])->name('admin.update');
    Route::get('/commandes', [\App\Http\Controllers\CommandeController::class, 'index'])->name('admin.commandes');
    Route::post('/commandes/{id}/update-status', [CommandeController::class, 'updateStatus'])->name('commandes.updateStatus');
    Route::get('/admin/commandes-par-date', [AdminController::class, 'commandesParDate'])->name('commandes.par.date');

});



