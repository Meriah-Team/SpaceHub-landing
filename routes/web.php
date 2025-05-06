<?php

use App\Http\Controllers\DetailController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminFeedbackController;
use App\Http\Controllers\Admin\AdminWorkspaceController;
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

// Admin auth routes
Route::get('admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [AdminAuthController::class, 'login']);
Route::post('admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// Admin protected routes
Route::middleware(['admin'])->prefix('admin')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/workspace', [AdminWorkspaceController::class, 'showWorkspace'])->name('admin.workspace');
    Route::get('/feedback', [AdminFeedbackController::class, 'index'])->name('admin.feedback');
    Route::get('/feedback/export', [AdminFeedbackController::class, 'export'])->name('admin.feedback.export');
});