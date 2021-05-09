<?php

// use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TranslationController;

Route::get('/translations', [TranslationController::class, 'index']); // korinishi  barchasini
Route::post('/translation', [TranslationController::class, 'store']); // qoshish creat
Route::get('/translations/{id}', [TranslationController::class, 'show']); // bita id  korinishi
Route::put('/translations/{id}', [TranslationController::class, 'update']);  // edit
Route::delete('/translations/{id}', [TranslationController::class, 'destroy']); // ochirish

Route::resource('posts', PostController::class);
