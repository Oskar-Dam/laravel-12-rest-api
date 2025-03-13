<?php

use App\Http\Controllers\PotionController;
use Illuminate\Support\Facades\Route;

Route::apiResource('potions', PotionController::class);
