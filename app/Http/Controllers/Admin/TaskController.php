<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\MemberTask;
use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Display create data
    public function create(){
        $data = [
            'title'     => 'Create Tasks',
            'page'      => 'Tasks',
            'users'     => User::where('role', 'user')->get() // temporary
        ];

        return view('admin.tasks.create', $data);
    }

    // Store data task 
    public function store(StoreTaskRequest $request) {
        $data = $request->validated();

        $task = Task::create([
            'title'         => $data['title'],
            'description'   => $data['description'],
            'deadline'      => Carbon::now(), // temp
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

        session()->flash('success', 'Successfully add task');
        return back();
    }

    

    // Update spesific data in task 
    public function update(UpdateTaskRequest $request, Task $task) {
        $data = $request->validated();
        $task->update($data);

        session()->flash('success', 'Successfully update task');
        return back();
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

        session()->flash('success', 'Successfully delete task');
        return back();
    }
}
