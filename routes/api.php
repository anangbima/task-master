<?php

use App\Http\Controllers\Api\Admin\AdminController as AdminAdminController;
use App\Http\Controllers\Api\Admin\ComentController as AdminComentController;
use App\Http\Controllers\Api\Admin\MemberProjectController as AdminMemberProjectController;
use App\Http\Controllers\Api\Admin\MemberTaskController as AdminMemberTaskController;
use App\Http\Controllers\Api\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Api\Admin\TaskController as AdminTaskController;
use App\Http\Controllers\Api\Admin\UserController as AdminUserController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\TaskController;
use App\Http\Controllers\Api\User\ProjectController as UserProjectController;
use App\Http\Controllers\Api\User\TaskController as UserTaskController;
use App\Http\Controllers\Api\User\UserController as UserUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('registrasi', [AuthController::class, 'registrasi'])->name('registrasi');

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    
    Route::middleware(['isAdmin'])->group(function () {
        Route::prefix('admin')->group(function () {
            Route::resource('projects', AdminProjectController::class)->parameters([
                'projects'      => 'project:slug'
            ]);

            Route::post('update-status-task', [AdminTaskController::class, 'updateStatus'])->name('admin-update-status-task');
            Route::resource('tasks', AdminTaskController::class);

            Route::resource('member-project', AdminMemberProjectController::class)->only([
                'store', 'destroy'
            ]);

            Route::resource('member-task', AdminMemberTaskController::class)->only([
                'store', 'destroy'
            ]);

            Route::resource('coments', AdminComentController::class)->only([
                'store'
            ]);

            Route::get('user', [AdminUserController::class, 'index'])->name('admin-user'); 
        });
    });

    Route::middleware(['isUser'])->group(function () {
        Route::get('/', [UserUserController::class, 'index'])->name('user-index');
        
        Route::resource('projects', UserProjectController::class)->only('show', 'index')->parameters([
            'projects'          => 'project:slug',
        ])->middleware('isMemberProject');

        Route::post('update-status-task', [UserTaskController::class, 'updateStatus'])->name('update-status-task')->middleware('isMemberTask');
    });
});
