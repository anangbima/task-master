<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\MemberProject;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    protected $project;

    public function __construct(){
        $this->project = new Project();
    }

    // Display listing of the resource
    public function index() {
        return response()->json([
            'status'    => true,
            'projects'  => Project::with('member.user', 'task.member.user', 'task.coment')->get()
        ], 200);
    }

    // Display specific projects
    public function show(Project $project) {
        return response()->json([
            'status'    => true,
            'project'   => $project,
        ], 200);
    }

    public function store(StoreProjectRequest $request) {
        $data = $request->validated();
        $project = $this->project->store($data);
        
        if($project && $request->member != null) {
            foreach($request->member as $value) {
                MemberProject::create([
                    'project_id'    => $project->id,
                    'user_id'       => $value,
                    'role'          => 'test role'
                ]);
            }
        }

        return response()->json([
            'status'        => true,
            'message'       => 'Success add data',
        ], 200);
    }

    // Update spesific data in project
    public function update(UpdateProjectRequest $request, Project $project) {
        $data = $request->validated();
        $project->update($data);

        return response()->json([
            'status'        => true,
            'message'       => 'Success update data',
        ], 200);
    }

    // Remove spesific data in project
    public function destroy(Project $project) {
        $project->delete();

        // Jika mempunyai member, dihapus sekalian
        if($project->member != null) {
            foreach($project->member as $member) {
                $member->delete();
            }
        }

        // Jika mempunyai tugas, dihapus sekalian
        if ($project->task != null) {
            foreach($project->task as $task) {
                $task->delete();
            }
        }

        return response()->json([
            'status'        => true,
            'message'       => 'Success delete data',
        ], 200);
    }
}
