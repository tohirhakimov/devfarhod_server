<?php

// use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;



Route::apiResources([
    'categories' => CategoryController::class
]);
