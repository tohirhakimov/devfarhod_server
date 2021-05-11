<?php
use illuminate\support\Facades\Route;

<<<<<<< HEAD
// use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;



Route::apiResources([
    'categories' => CategoryController::class
]);
=======
use App\Http\Controllers\UserController;

Route::apiResources([
    'Users'=> UserController::class
]);

// Route::get('/users', [UserController::class, 'index']); // korinishi  barchasini
// Route::post('/users', [UserController::class, 'store']); // qoshish creat
// Route::get('/users/{id}', [UserController::class, 'show']); // bita id  korinishi
// Route::put('/users/{id}', [UserController::class, 'update']);  // edit
// Route::delete('/users/{id}', [UserController::class, 'destroy']); // ochirish
>>>>>>> 140b63f1a6c084ff417249aa5ec44a4d6951b2e5
