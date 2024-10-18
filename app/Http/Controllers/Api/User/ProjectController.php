<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    // Display listing of the resource
    public function index() {
        $user = Auth::user();

        return response()->json([
            'status'    => true,
            'projects'  => Project::with('member.user', 'task.member.user', 'task.coment')->hasMember($user->id)->get()
        ], 200);
    }

    // display projects
    public function show(Project $project) {
        return response()->json([
            'status'    => true,
            'tasks'     => $project
        ], 200);
    }
}
