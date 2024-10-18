<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index() {
        return response()->json([
            'status'    => true,
            'projects'  => Task::all()
        ], 200);
    }

    // update status of the task
    public function updateStatus(Request $request) {
        $task = Task::find($request->id);
        $task->update([
            'status'    => $request->status
        ]);

        return response()->json([
            'status'        => true,
            'message'       => 'Success update data',
        ], 200);
    }
}
