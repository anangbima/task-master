<?php

namespace App\Console\Commands;

use App\Mail\SendMail;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class sendEmails extends Command 
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    { 
        $now = Carbon::now();
        $addDay = $now->copy()->addDay();
        $tasks = Task::with('member.user')->whereBetween('due_date', [$now, $addDay])->where('isNotify', false)->get();
        if ($tasks) {
            foreach($tasks as $task) {
                foreach ($task->member as $member) {
                    Mail::to($member->user->email)->send(new SendMail(['name' =>$member->user->name ]));
                    $task->update(['isNotify', true]);
                }
            }
        }
        // foreach($tasks as $task) {
        // }
    }
}
