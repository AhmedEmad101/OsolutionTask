<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Project::create([
            'title' => 'E-commerce Redesign',
            'creator_id' => 1,
            'description' => 'Full redesign and development of the online store frontend and checkout flow.',
        ]);
        
        Project::create([
            'title' => 'Internal Reporting Tool',
            'creator_id' => 1,
            'description' => 'Creation of a dashboard for internal performance metrics.',
        ]);
    }
}
