<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Category;
use App\Events\ProjectSaved;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\SaveProjectRequest;
// use Illuminate\Support\Facades\Gate;

class ProjectController extends Controller {

    public function __construct(){
        $this -> middleware('auth') -> except('index', 'show');
    }

    //* Metodo index
    public function index(){
        return view('projects.index', [
            'newProject' => new Project,
            'projects' => Project::with('category') -> latest() -> paginate(),
            'deletedProjects' => Project::onlyTrashed() -> get()
        ]);
    }

    //* Metodo show
    public function show(Project $project){
        return view('projects.show', [
            'project' => $project
        ]);
    }

    //* Metodo create
    public function create(Project $project){
        $this -> authorize('create', $project = new Project);
        return view('projects.create', [
            'project' => $project,
            'categories' => Category::pluck('name', 'id')
        ]);
    }

    //* Metodo store
    public function store(SaveProjectRequest $request){
        $project = new Project( $request -> validated() );

        $this -> authorize('create', $project);

        $project -> image = $request -> file('image') -> store('images');
        $project -> save();

        ProjectSaved::dispatch($project);

        return redirect() -> route('projects.index') -> with('status', 'The project was created successfully');
    }

    //* Metodo edit
    public function edit( Project $project ){
        $this -> authorize('update', $project);

        return view('projects.edit', [
            'project' => $project,
            'categories' => Category::pluck('name', 'id')
        ]);
    }

    //* Metodo update
    public function update(Project $project, SaveProjectRequest $request){
        $this -> authorize('update', $project);
        if ( $request -> hasFile('image') ) {
            if( $project -> image && Storage::exists($project -> image) ){
                Storage::delete($project -> image);
            }
            $project = $project -> fill( $request -> validated() );
            $project -> image = $request -> file('image') -> store('images');
            $project -> save();

            ProjectSaved::dispatch($project);

        }else {
            $project -> update(array_filter($request -> validated()));
        }
        return redirect() -> route('projects.show', $project) -> with('status', 'The project was updated successfully'); //Se envia a la ruta show con el proyecto actualizado
    }

    //* Metodo destroy
    public function destroy(Project $project){
        $this -> authorize('delete', $project);
        $project -> delete();
        return redirect() -> route('projects.index') -> with('status', 'The project was deleted successfully');
    }

    //* Metodo restore
    public function restore($projectUrl){
        $project = Project::withTrashed() -> whereurl($projectUrl) -> firstOrFail();
        $this -> authorize('restore', $project);
        $project -> restore();
        return redirect() -> route('projects.index') -> with('status', 'The project was restored successfully');
    }

    //* Metodo forceDelete
    public function forceDelete($projectUrl){
        $project = Project::withTrashed() -> whereurl($projectUrl) -> firstOrFail();
        $this -> authorize('forceDelete', $project);
        Storage::delete($project -> image);
        $project -> foreceDelete();
        return redirect() -> route('projects.index') -> with('status', 'The project was deleted permanently');
    }

}
