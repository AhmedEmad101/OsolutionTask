<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Project;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_creates_a_new_project()
    {
        Sanctum::actingAs(User::factory()->create());

        $data = [
            'title' => 'New Project',
            'description' => 'Project Description'
        ];

        $response = $this->postJson('/api/projects/create', $data);

        $response->assertStatus(201)
                 ->assertJson([
                     'status' => 'success',
                     'data' => [
                         'title' => 'New Project'
                     ]
                 ]);

        $this->assertDatabaseHas('projects', [
            'title' => 'New Project'
        ]);
    }

    /** @test */
    public function test_it_updates_a_project()
{
    // 1️⃣ Create a user and authenticate via Sanctum
    $user = User::factory()->create();
    Sanctum::actingAs($user);

    // 2️⃣ Create a project that belongs to the authenticated user
    $project = Project::factory()->create([
        'creator_id' => $user->id,
        'title' => 'Original Project',
    ]);

    // 3️⃣ Prepare the update payload
    $payload = [
        'title' => 'Updated Project',
        'description' => 'Updated description', // optional
    ];

    // 4️⃣ Send PATCH request to update the project
    $response = $this->patchJson('/api/projects/' . $project->id, $payload, [
        'Accept' => 'application/json',
    ]);

    // 5️⃣ Assert HTTP response is 200 OK
    $response->assertStatus(200)
             ->assertJson([
                 'status' => 'success',
                 'message' => 'project has been updated successfully',
             ]);

    // 6️⃣ Assert database has the updated data
    $this->assertDatabaseHas('projects', [
        'id' => $project->id,
        'title' => 'Updated Project',
        'description' => 'Updated description',
        'creator_id' => $user->id,
    ]);
}
}
