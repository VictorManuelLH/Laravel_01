<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Events\ProjectSaved;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\SaveProjectRequest;

class ProjectController extends Controller {

    public function __construct(){
        $this -> middleware('auth') -> except('index', 'show');
    }

    //* Metodo index
    public function index(){
        return view('projects.index', [
            'projects' => Project::latest() -> paginate()
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
        return view('projects.create', [
            'project' => new Project
        ]);
    }

    //* Metodo store
    public function store(SaveProjectRequest $request){
        $project = new Project( $request -> validated() );
        $project -> image = $request -> file('image') -> store('images');
        $project -> save();

        ProjectSaved::dispatch($project);

        return redirect() -> route('projects.index') -> with('status', 'The project was created successfully');
    }

    //* Metodo edit
    public function edit( Project $project ){
        return view('projects.edit', [
            'project' => $project
        ]);
    }

    //* Metodo update
    public function update(Project $project, SaveProjectRequest $request){
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
        Storage::delete($project -> image);
        $project -> delete();
        return redirect() -> route('projects.index') -> with('status', 'The project was deleted successfully');
    }

}
