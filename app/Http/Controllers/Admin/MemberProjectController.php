<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMemberProjectRequest;
use App\Models\MemberProject;
use Illuminate\Http\Request;
class MemberProjectController extends Controller
{
    // Store data to member project
    public function store(StoreMemberProjectRequest $request) {
        $data = $request->validated();

        MemberProject::create([
            'user_id'       => $data['user_id'],
            'project_id'    => $data['project_id']
        ]);

        return redirect('projects');
    }

    // Remove specific member in project
    public function destroy(MemberProject $memberProject) {
        $memberProject->delete();

        return redirect('projects');
    }
}
