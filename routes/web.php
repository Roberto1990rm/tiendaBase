<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticuloController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/about', function () {
    return view('about');
});

Route::get('/articulos', [App\Http\Controllers\ArticuloController::class, 'index']);
Route::get('/articulos/create', [ArticuloController::class, 'create']);
Route::post('/articulos', [ArticuloController::class, 'store']);

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
