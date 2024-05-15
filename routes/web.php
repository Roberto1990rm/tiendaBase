<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;




Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [HomeController::class, 'index'])->name('welcome');

Route::get('/about', function () {
    return view('about');
});
Route::get('/articulos/create', [ArticuloController::class, 'create']);
Route::get('/articulos', [App\Http\Controllers\ArticuloController::class, 'index']);
Route::get('/articulos/{id}', [ArticuloController::class, 'show'])->name('articulos.show');
Route::post('/articulos', [ArticuloController::class, 'store']);
Route::delete('/articulos/{id}', [ArticuloController::class, 'destroy'])->name('articulos.destroy');

Route::get('/buscar', [ArticuloController::class, 'buscar'])->name('buscar');




Route::middleware(['auth'])->group(function () {
    Route::get('/user/panel', [UserController::class, 'panel'])->name('user.panel');
});



Route::get('/contact', function () {
    return view('contact');
})->name('contact');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');


Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
