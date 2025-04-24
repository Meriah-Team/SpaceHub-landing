<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;

Route::get('/template', function () {
    return view('welcome');
});

Route::get('/', [LandingController::class, 'index']);
