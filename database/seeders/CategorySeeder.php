<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Development', 
            'color' => '#10B981', 
            'icon_url' => 'https://example.com/icons/dev.svg'
        ]);     
        Category::create([
            'name' => 'Design',       
            'color' => '#3B82F6',
            'icon_url' => 'https://example.com/icons/design.svg'
        ]);       
        
        Category::create([
            'name' => 'Documentation', 
            'color' => '#F59E0B', 
            'icon_url' => 'https://example.com/icons/docs.svg'
        ]);    
        Category::create([
            'name' => 'Testing', 
            'color' => '#EF4444',
            'icon_url' => 'https://example.com/icons/test.svg'
        ]);
    }
}
