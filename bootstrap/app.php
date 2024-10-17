<?php

use App\Http\Middleware\CheckRole;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
        // $middleware->append(CheckRole::class);
        $middleware->alias([
            'isAdmin'           =>  \App\Http\Middleware\isAdmin::class,
            'isUser'            =>  \App\Http\Middleware\isUser::class,
            'isMemberProject'   =>  \App\Http\Middleware\isMemberProject::class,
            'isMemberTask'      =>  \App\Http\Middleware\isMemberTask::class,
        ]);
    })
    ->withSchedule(function(Schedule $schedule){
        $schedule->command('send-emails')->everyTenSeconds();
        
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
