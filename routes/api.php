<?php

use App\Http\Controllers\PostTagController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::apiResources([
    'Users' => UserController::class,
    'Tags' => TagController::class,
    'PostTag' => PostTagController::class
]);
