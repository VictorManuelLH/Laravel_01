<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
// use App\Events\ProjectSaved;
// use Illuminate\Support\Facades\Storage;
use App\Http\Requests\SaveProjectRequest;

class ProjectController extends Controller {

    public function __construct(){
        $this -> middleware('auth') -> except('index', 'show');
    }

    public function index(){
        return view('projects.index', [
            'projects' => Project::latest() -> paginate()
        ]);
    }

    public function show(Project $project){
        return view('projects.show', [
            'project' => $project
        ]);
    }

    public function create(Project $project){
        return view('projects.create', [
            'project' => new Project
        ]);
    }

    public function store( SaveProjectRequest $request ){
        Project::create($request -> validated());
        return redirect() -> route('projects.index') -> with('status', 'The project created exited');
    }

    public function edit( Project $project ){
        return view('projects.edit', [
            'project' => $project
        ]);
    }

    public function update( Project $project, SaveProjectRequest $request ){
        $project -> update($request -> validated());
        return redirect() -> route('projects.show', $project) -> with('status', 'Project updated exited');
    }

    public function destroy( Project $project ){
        $project -> delete();
        return redirect() -> route('projects.index') -> with('status', 'Project deleted exited');
    }

}
