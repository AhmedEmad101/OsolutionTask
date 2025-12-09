<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Task;
use Carbon\Carbon;
class TaskSeeder extends Seeder
{
    public function run(): void
    {
       Task::create([
            'title' => 'Implement User Authentication',
            'description' => 'Setup Laravel Sanctum and configure login/registration endpoints.',
            'project_id' => 1,
            'category_id' => 1,
            'completed' => false,
            'priority' => 'high',
            'due_date' => Carbon::now()->addDays(3),
        ]);

        Task::create([
            'title' => 'Design Checkout Flow Mockups',
            'description' => 'Create detailed Figma mockups for the new checkout screens.',
            'project_id' => 1,
            'category_id' => 2,
            'completed' => false,
            'priority' => 'medium',
            'due_date' => Carbon::now()->addWeek(),
        ]);
        Task::create([
            'title' => 'Write Unit Tests for Dashboard',
            'description' => 'Create comprehensive PHPUnit tests for the reporting logic.',
            'project_id' => 2,
            'category_id' => 3,
            'completed' => false,
            'priority' => 'low',
            'due_date' => Carbon::now()->addWeeks(2),
        ]);
    }
}
