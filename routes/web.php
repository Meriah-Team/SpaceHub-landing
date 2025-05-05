<?php

use App\Http\Controllers\DetailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\FeedbackController;

Route::get('/template', function () {
    return view('welcome');
});

Route::get('/', [LandingController::class, 'index'])->name('landing.index');
Route::get('/explore', [LandingController::class, 'explore'])->name('landing.explore');
Route::get('/detail', [DetailController::class, 'index'])->name('detail.index');
Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');