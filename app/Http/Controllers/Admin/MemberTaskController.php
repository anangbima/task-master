<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMemberTaskRequest;
use App\Models\MemberTask;
use Illuminate\Http\Request;

class MemberTaskController extends Controller
{
    // Store data to member project
    public function store(StoreMemberTaskRequest $request) {
        $data = $request->validated();

        MemberTask::create([
            'user_id'       => $data['user_id'],
            'task_id'       => $data['task_id']
        ]);

        return redirect('projects');
    }

    // Remove specific member in project
    public function destroy(MemberTask $memberTask) {
        $memberTask->delete();

        return redirect('projects');
    }
}
