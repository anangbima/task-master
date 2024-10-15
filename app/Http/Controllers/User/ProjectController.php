<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    // display projects user
    public function show(Project $project) {
        $data = [
            'title'     => $project->name,
            'project'   => $project
        ];

        return view('user.projects.show', $data);
    }
}
