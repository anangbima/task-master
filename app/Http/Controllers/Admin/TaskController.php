<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\MemberTask;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Store data task 
    public function store(StoreTaskRequest $request) {
        $data = $request->validated();

        $task = Task::create([
            'title'         => $data['title'],
            'description'   => $data['description'],
            'deadline'      => '0000-00-00 00:00:00',
            'status'        => 'Not Started',
            'project_id'    => '1', // statis
        ]);

        if ($task && $request->member != null) {
            foreach ($request->member as $value) {
                MemberTask::create([
                    'task_id'   => $task->id,
                    'user_id'   => $value
                ]);
            }
        }

        return redirect('projects');
    }

    // Update spesific data in task 
    public function update(UpdateTaskRequest $request, Task $task) {
        $data = $request->validated();
        $task->update($data);

        return redirect('projects');
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

        return redirect('projects');
    }
}
