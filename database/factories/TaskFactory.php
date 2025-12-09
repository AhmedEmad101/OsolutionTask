<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Task;
use App\Models\Project;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    protected $model = Task::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(),
            'priority' => 'medium',
            'due_date' => now()->addDays(5),
            'category_id' => Category::factory(),
            'project_id' => Project::factory(),
        ];
    }
}
