<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TranslationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;

Route::apiResources([
    'translations' => TranslationController::class,
    'categories' => CategoryController::class,
    'users' => UserController::class,
    'posts' => PostController::class,
<<<<<<< HEAD
    'postscategory' => PostCategoryController::class
=======
>>>>>>> main
]);
