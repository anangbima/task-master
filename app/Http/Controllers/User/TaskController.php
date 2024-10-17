<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // update status of the task
    public function updateStatus(Request $request) {
        $task = Task::find($request->id);
        $task->update([
            'status'    => $request->status
        ]);

        session()->flash('success', 'Successfully update status');
        return back();
    }
}
