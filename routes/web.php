<?php

use App\Http\Controllers\DetailController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminFeedbackController;
use App\Http\Controllers\Admin\AdminWorkspaceController;
use App\Http\Controllers\Admin\AdminRoomController;
use App\Http\Controllers\Admin\AdminTableController;
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
    Route::post('/workspace', [AdminWorkspaceController::class, 'store'])->name('admin.workspace.store');
    Route::get('/workspace/{workspace}', [AdminWorkspaceController::class, 'detail'])->name('admin.workspace.detail');
    Route::post('/workspace/{workspace}/images', [AdminWorkspaceController::class, 'addImages'])->name('admin.workspace.addImages');
    Route::get('/feedback', [AdminFeedbackController::class, 'index'])->name('admin.feedback');
    Route::get('/feedback/export', [AdminFeedbackController::class, 'export'])->name('admin.feedback.export');
    Route::delete('workspace/{workspace}/image/{index}', [AdminWorkspaceController::class, 'removeImage'])->name('admin.workspace.removeImage');
    Route::post('/workspace/{workspace}/cover-image', [AdminWorkspaceController::class, 'setCoverImage'])->name('admin.workspace.setCoverImage');
    Route::post('/workspace/{workspace}/description-images', [AdminWorkspaceController::class, 'addDescriptionImages'])->name('admin.workspace.addDescriptionImages');
    Route::delete('workspace/{workspace}/description-image/{index}', [AdminWorkspaceController::class, 'removeDescriptionImage'])->name('admin.workspace.removeDescriptionImage');
    
    // Room routes
    Route::post('/room', [AdminRoomController::class, 'store'])->name('admin.room.store');
    Route::get('/room/{room}/edit', [AdminRoomController::class, 'edit'])->name('admin.room.edit');
    Route::put('/room/{room}', [AdminRoomController::class, 'update'])->name('admin.room.update');
    Route::delete('/room/{room}', [AdminRoomController::class, 'destroy'])->name('admin.room.destroy');
    
    // Table routes
    Route::post('/table', [AdminTableController::class, 'store'])->name('admin.table.store');
    Route::get('/table/{table}/edit', [AdminTableController::class, 'edit'])->name('admin.table.edit');
    Route::put('/table/{table}', [AdminTableController::class, 'update'])->name('admin.table.update');
    Route::delete('/table/{table}', [AdminTableController::class, 'destroy'])->name('admin.table.destroy');
});