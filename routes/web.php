<?php

use App\Http\Controllers\Admin\AdminController as AdminAdminController;
use App\Http\Controllers\Admin\MemberProjectController as AdminMemberProjectController;
use App\Http\Controllers\Admin\MemberTaskController as AdminMemberTaskController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Admin\TaskController as AdminTaskController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\User\ProjectController as UserProjectController;
use App\Http\Controllers\User\UserController as UserUserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', [AuthController::class, 'login'])->name('login');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/registrasi', [AuthController::class, 'registrasi'])->name('registrasi');
Route::post('/peoses-login', [AuthController::class, 'prosesLogin'])->name('proses-login');
Route::post('/peoses-registrasi', [AuthController::class, 'prosesRegistrasi'])->name('proses-registrasi');


Route::middleware(['auth'])->group( function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    // Route admin 
    Route::middleware(['role:admin'])->group(function () {
        Route::prefix('admin')->group(function () {
            Route::get('/', [AdminAdminController::class, 'index'])->name('dashboard-admin');

            Route::resource('projects', AdminProjectController::class)->parameters([
                'projects'      => 'project:slug'
            ]);

            Route::resource('tasks', AdminTaskController::class);

            Route::resource('member-project', AdminMemberProjectController::class)->only([
                'store', 'destroy'
            ]);
            
            Route::resource('member-task', AdminMemberTaskController::class)->only([
                'store', 'destroy'
            ]);

            Route::get('user', [AdminUserController::class, 'index'])->name('admin-user');
            Route::get('profile', [AdminAdminController::class, 'profile'])->name('admin-profile');
        });
    });

    // Route user
    Route::middleware(['role:user'])->group(function () {
        Route::get('/', [UserUserController::class, 'index'])->name('user-index');
        Route::get('profile', [UserUserController::class, 'profile'])->name('user-profile');

        Route::resource('projects', UserProjectController::class)->only('show')->parameters([
            'projects'          => 'project:slug',
        ])->middleware('memberProject');

        
    });
});

// Route::get('/test', [UserUserController::class, 'index']);
