<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('registrasi', [AuthController::class, 'registrasi'])->name('registrasi');

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    // Route admin
    Route::middleware(['isAdmin'])->group(function () {
        Route::prefix('admin')->group(function () {
            Route::resource('projects', ProjectController::class)->parameters([
                'projects'      => 'project:slug'
            ]);

            Route::resource('tasks', TaskController::class);
            
        });
    });
});
