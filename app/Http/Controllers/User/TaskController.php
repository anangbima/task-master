<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // update status of the task
    public function updateStatus($status, $id) {
        $task = Task::find($id);
        $task->update([
            'status'    => $status
        ]);

        session()->flash('success', 'Successfully update status');
        return back();
    }
}
