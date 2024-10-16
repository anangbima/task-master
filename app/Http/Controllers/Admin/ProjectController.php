<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\MemberProject;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    protected $project;

    public function __construct(){
        $this->project = new Project;
    }

    // Display listing of the resource
    public function index() {
        $data = [
            'title'     => 'Projects',
            'page'      => 'projects',
            'projects'  => Project::with('member.user', 'task.member.user', 'task.coment')->orderBy('id', 'desc')->get(), 
        ];

        return view('admin.projects.index', $data);
    }

    // Display specific projects
    public function show(Project $project) {
        $data = [
            'title'     => $project->name,
            'page'      => 'projects',
            'project'   => $project,
            'users'     => User::with('memberProject.project')->where('role', 'user')->get() // temporary
        ];

        // dd($data['users']->toArray());

        return view('admin.projects.show', $data);
    }

    // Display create data
    public function create(){
        $data = [
            'title'     => 'Create Projects',
            'page'      => 'projects',
            'users'     => User::where('role', 'user')->get()
        ];

        return view('admin.projects.create', $data);
    }

    // Store data projects
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

        session()->flash('success', 'Successfully add project');
        return redirect('/admin/projects');
    }

    // Display edit data
    public function edit(Project $project) {
        $data = [
            'title'     => 'Update Projects',
            'page'      => 'projects',
            'project'   => $project
        ];

        return view('admin.projects.update', $data);
    }

    // Update spesific data in project
    public function update(UpdateProjectRequest $request, Project $project) {
        $data = $request->validated();
        $project->update($data);

        session()->flash('success', 'Successfully update project');
        return redirect('/admin/projects');
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

        session()->flash('success', 'Successfully delete project');
        return redirect('/admin/projects');
    }
}
