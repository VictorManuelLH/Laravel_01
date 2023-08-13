<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Project;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ListProjectsTest extends TestCase{

    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_can_see_all_projects(){
        $project = Project::create([
            'title' => 'Mi nuevo proyecto xs',
            'url' => 'mi-nuevo-proyecto',
            'description' => 'Descripcion de mi nuevo proyect'
        ]);
        $project2 = Project::create([
            'title' => 'Mi nuevo proyecto xs 2',
            'url' => 'mi-nuevo-proyecto-2',
            'description' => 'Descripcion de mi nuevo proyect 2'
        ]);
        $response = $this->get(route('projects.index'));

        $response->assertStatus(200);

        $response -> assertViewIs('projects.index');
        $response -> assertViewHas('projects');
        $response -> assertSee( $project -> title );
        $response -> assertSee( $project2 -> title );
    }

    public function test_can_see_individual_projects(){
        $project = Project::create([
            'title' => 'Mi nuevo proyecto xs',
            'url' => 'mi-nuevo-proyecto',
            'description' => 'Descripcion de mi nuevo proyect'
        ]);
        $project2 = Project::create([
            'title' => 'Mi nuevo proyecto xs 2',
            'url' => 'mi-nuevo-proyecto-2',
            'description' => 'Descripcion de mi nuevo proyect 2'
        ]);
        $response = $this->get(route('projects.show', $project));

        $response -> assertSee($project -> title);
        $response -> assertDontSee($project2 -> title);
    }

}
