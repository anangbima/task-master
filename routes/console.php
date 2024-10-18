<?php

use App\Mail\SendMail;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();
Schedule::command('send:emails')->everyTenSeconds();
// Schedule::call(function(){

//     $now = Carbon::now();
//     $addDay = $now->copy()->addDay();
//     $tasks = Task::with('member.user')->whereBetween('due_date', [$now, $addDay])->where('isNotify',false)->get();
//     dd($tasks);
//     if ($tasks) {
//         foreach($tasks as $task) {
//             foreach ($task->member as $member) {
//                 Mail::to($member->user->email)->send(new SendMail(['name' =>$member->user->name ]));
//                 $task->update(['isNotify', true]);
//             }
//         }
//     }

// })->everyTenSeconds();

