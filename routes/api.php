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

Route::get('/tags/{tag}', function (Tag $tag) {
    return response()->json($tag, 200);
});

Route::post('/tags', function (Request $request) {
    return response()->json(Tag::create($request->all()), 201);
});

Route::put('/tags/{tag}', function (Request $request, Tag $tag) {
    return response()->json($tag->update($request->all()), 201);
});

Route::delete('/tags/{tag}', function (Tag $tag) {
    $tag->delete();
    return response()->json(null, 204);
});