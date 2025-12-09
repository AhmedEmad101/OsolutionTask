<?php

namespace Tests\Feature;

use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class ProjectsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_creates_a_new_project()
    {
        Sanctum::actingAs(User::factory()->create());

        $data = [
            'title' => 'New Project',
            'description' => 'Project Description',
        ];

        $response = $this->postJson('/api/projects/create', $data);

        $response->assertStatus(201)
            ->assertJson([
                'status' => 'success',
                'data' => [
                    'title' => 'New Project',
                ],
            ]);

        $this->assertDatabaseHas('projects', [
            'title' => 'New Project',
        ]);
    }

    /** @test */
    public function test_it_updates_a_project()
    {
        $user = User::factory()->create();
        Sanctum::actingAs($user);

        $project = Project::factory()->create([
            'creator_id' => $user->id,
            'title' => 'Original Project',
        ]);

        $payload = [
            'title' => 'Updated Project',
            'description' => 'Updated description', 
        ];

        $response = $this->patchJson('/api/projects/'.$project->id, $payload, [
            'Accept' => 'application/json',
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'status' => 'success',
                'message' => 'project has been updated successfully',
            ]);

        $this->assertDatabaseHas('projects', [
            'id' => $project->id,
            'title' => 'Updated Project',
            'description' => 'Updated description',
            'creator_id' => $user->id,
        ]);
    }
}
