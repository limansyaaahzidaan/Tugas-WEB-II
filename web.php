<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BangunanController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('bangunan', BangunanController::class);
Route::get('/Formulir', [App\Http\Controllers\FormulirController::class, 'create']);
Route::post('/Formulir', [App\Http\Controllers\FormulirController::class, 'store'])->name('formulir.store');
