<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Task;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TasksTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_lists_all_tasks()
    {
        Sanctum::actingAs(User::factory()->create());

        Task::factory()->count(3)->create();

        $response = $this->getJson('/api/tasks');

       $response->assertJsonStructure([
    'status',
    'message',
    'data' => [
        '*' => [
            'id',
            'project',
            'title',
            'description',
            'category_id',
            'project_id',
            'completed',
            'priority',
            'due_date',
            'image_url',
            'created_at'
        ]
    ]
]);
    }

    /** @test */
    public function it_returns_single_task()
    {
        Sanctum::actingAs(User::factory()->create());

        $task = Task::factory()->create();

        $response = $this->getJson('/api/tasks/' . $task->id);

        $response->assertStatus(200)
                 ->assertJson([
                     'status' => 'success',
                     'data' => [
                         'id' => $task->id
                     ]
                 ]);
    }

    /** @test */
public function it_creates_new_task()
{
    Sanctum::actingAs(User::factory()->create());

    $project = \App\Models\Project::factory()->create();
    $category = \App\Models\Category::factory()->create();

    $data = [
        'title' => 'New Task',
        'description' => 'Test task description',
        'priority' => 'high',
        'project_id' => $project->id,
        'category_id' => $category->id,
        'due_date' => now()->addDays(3)->format('Y-m-d'),
    ];

    $response = $this->postJson('/api/tasks/create', $data);

    $response->assertStatus(201);
}

    /** @test */
    public function it_updates_a_task()
    {
        Sanctum::actingAs(User::factory()->create());

        $task = Task::factory()->create();

        $response = $this->patchJson('/api/tasks/' . $task->id, [
            'title' => 'Updated Title'
        ]);

        $response->assertStatus(200)
                 ->assertJson([
                     'status' => 'success'
                 ]);

        $this->assertDatabaseHas('tasks', [
            'id' => $task->id,
            'title' => 'Updated Title'
        ]);
    }

    /** @test */
    public function it_deletes_a_task()
    {
        Sanctum::actingAs(User::factory()->create());

        $task = Task::factory()->create();

        $response = $this->deleteJson('/api/tasks/' . $task->id);

        $response->assertStatus(204);

        $this->assertDatabaseMissing('tasks', [
            'id' => $task->id
        ]);
    }
}
