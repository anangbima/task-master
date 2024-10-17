<?php

use App\Http\Controllers\Admin\AdminController as AdminAdminController;
use App\Http\Controllers\Admin\ComentController;
use App\Http\Controllers\Admin\MemberProjectController as AdminMemberProjectController;
use App\Http\Controllers\Admin\MemberTaskController as AdminMemberTaskController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Admin\TaskController as AdminTaskController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\User\ComentController as UserComentController;
use App\Http\Controllers\User\TaskController as UserTaskController;
use App\Http\Controllers\User\ProjectController as UserProjectController;
use App\Http\Controllers\User\UserController as UserUserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', [AuthController::class, 'login'])->name('login');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/registrasi', [AuthController::class, 'registrasi'])->name('registrasi');
Route::post('/peoses-login', [AuthController::class, 'prosesLogin'])->name('proses-login');
Route::post('/peoses-registrasi', [AuthController::class, 'prosesRegistrasi'])->name('proses-registrasi');


Route::middleware(['auth'])->group( function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    // Route admin 
    Route::middleware(['isAdmin'])->group(function () {
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

            Route::resource('coments', ComentController::class)->only([
                'store'
            ]);

            Route::get('user', [AdminUserController::class, 'index'])->name('admin-user');
            Route::get('profile', [AdminAdminController::class, 'profile'])->name('admin-profile');

            Route::get('send/mail', [MailController::class, 'sendMail'])->name('send-mail');
        });
    });

    // Route user
    Route::middleware(['isUser'])->group(function () {
        Route::get('/', [UserUserController::class, 'index'])->name('user-index');
        Route::get('profile', [UserUserController::class, 'profile'])->name('user-profile');

        Route::resource('projects', UserProjectController::class)->only('show')->parameters([
            'projects'          => 'project:slug',
        ])->middleware('isMemberProject');

        Route::post('update-status-task', [UserTaskController::class, 'updateStatus'])->name('update-status-task')->middleware('isMemberTask');
    });
});



// Route page error
Route::get('unauthorized', function() {
    return view('errors.403');
})->name('unauthorized');

