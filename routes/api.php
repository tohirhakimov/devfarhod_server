<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TranslationController;

Route::apiResources([
    'translations' => TranslationController::class
]);
