<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TranslationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostTagController;


Route::apiResources([
    'translations' => TranslationController::class,
    'categories' => CategoryController::class,
    'users' => UserController::class,
    'posts' => PostController::class,
    'postscategory' => PostCategoryController::class,
    'post_tags' => PostTagController::class

]);
