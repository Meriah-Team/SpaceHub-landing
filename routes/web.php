<?php

use App\Http\Controllers\DetailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;

Route::get('/template', function () {
    return view('welcome');
});

Route::get('/', [LandingController::class, 'index'])->name('landing.index');
Route::get('/explore', [LandingController::class, 'explore'])->name('landing.explore');
route::get('/detail', [DetailController::class, 'index'])->name('detail.index');