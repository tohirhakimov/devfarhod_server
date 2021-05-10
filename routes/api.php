<?php
use illuminate\support\Facades\Route;

use App\Http\Controllers\UserController;

Route::apiResources([
    'Users'=> UserController::class
]);

// Route::get('/users', [UserController::class, 'index']); // korinishi  barchasini
// Route::post('/users', [UserController::class, 'store']); // qoshish creat
// Route::get('/users/{id}', [UserController::class, 'show']); // bita id  korinishi
// Route::put('/users/{id}', [UserController::class, 'update']);  // edit
// Route::delete('/users/{id}', [UserController::class, 'destroy']); // ochirish