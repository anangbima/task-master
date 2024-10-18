<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    protected $project;

    public function __construct(){
        $this->project = new Project();
    }

    public function index() {
        return response()->json([
            'status'        => true,
            'message'       => 'Data berita',
            'data'          => Project::with('member.user', 'task.member.user', 'task.coment')->get(),
        ], 200);
    }

}
