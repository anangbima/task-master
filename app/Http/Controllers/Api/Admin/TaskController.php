<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\MemberTask;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Display listing of the resource
    public function index() {
        return response()->json([
            'status'    => true,
            'tasks'     => Task::all()
        ], 200);
    }

    

    // Store data task 
    public function store(StoreTaskRequest $request) {
        $data = $request->validated();

        $task = Task::create([
            'title'         => $data['title'],
            'description'   => $data['description'],
            'status'        => 'Not Started',
            'priority'      => $data['priority'],
            'due_date'      => $request->due_date, 
            'due_hour'      => $request->due_hour ?? '00:00:00', 
            'project_id'    => $request->project_id,
            // 'isNotify'      => false
        ]);

        if ($task && $request->member != null) {
            foreach ($request->member as $value) {
                MemberTask::create([
                    'task_id'   => $task->id,
                    'user_id'   => $value
                ]);
            }
        }

        return response()->json([
            'status'        => true,
            'message'       => 'Success add data',
        ], 200);
    }

    // Update spesific data in task 
    public function update(UpdateTaskRequest $request, Task $task) {
        $data = $request->validated();
        $task->update([
            'title'         => $data['title'],
            'description'   => $data['description'],
            'priority'      => $data['priority'],
            'due_date'      => $request->due_date, 
            'due_hour'      => $request->due_hour, 
        ]);

        return response()->json([
            'status'        => true,
            'message'       => 'Success update data',
        ], 200);
    }

    // Remove spesific data in project
    public function destroy(Task $task) {
        $task->delete();

        // Jika mempunyai member, dihapus sekalian
        if($task->member != null) {
            foreach($task->member as $member) {
                $member->delete();
            }
        }

        return response()->json([
            'status'        => true,
            'message'       => 'Success delete data',
        ], 200);
    }
}
