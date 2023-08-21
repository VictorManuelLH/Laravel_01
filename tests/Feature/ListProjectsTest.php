<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

class ListProjectsTest extends TestCase{

    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_can_see_all_projects(){

        $project = Project::factory()->create();
        $project2 = Project::factory()->create();

        $response = $this->get(route('projects.index'));

        $response->assertStatus(200);
        $response -> assertViewIs('projects.index');
        $response -> assertViewHas('projects');
        $response -> assertSee( $project -> title );
        $response -> assertSee( $project2 -> title );
    }

    public function test_can_see_individual_projects(){
        $project = Project::factory()->create();
        $project2 = Project::factory()->create();

        $response = $this->get(route('projects.show', $project));

        $response -> assertSee($project -> title);
        $response -> assertDontSee($project2 -> title);
    }

}
