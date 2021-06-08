<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TranslationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use App\Models\Tag;

Route::apiResources([
    'translations' => TranslationController::class,
    'users' => UserController::class,
    'posts' => PostController::class
]);

Route::get('/tags', function () {
    return response()->json(Tag::all(), 200);
});

Route::get('/tags/{tag}', function ($id) {
    return response()->json(Tag::find($id), 200);
});

Route::post('/tags', function (Request $request) {
    return Tag::create($request->all());
});