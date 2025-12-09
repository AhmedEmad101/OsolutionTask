<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

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
            'icon_url' => 'https://example.com/icons/dev.svg',
        ]);
        Category::create([
            'name' => 'Design',
            'color' => '#3B82F6',
            'icon_url' => 'https://example.com/icons/design.svg',
        ]);

        Category::create([
            'name' => 'Documentation',
            'color' => '#F59E0B',
            'icon_url' => 'https://example.com/icons/docs.svg',
        ]);
        Category::create([
            'name' => 'Testing',
            'color' => '#EF4444',
            'icon_url' => 'https://example.com/icons/test.svg',
        ]);
        Category::create([
            'name' => 'Painting',
            'color' => '#4f3131ff',
            'icon_url' => 'https://example.com/icons/test.svg',
        ]);
        Category::create([
            'name' => 'Studying',
            'color' => '#2e0808ff',
            'icon_url' => 'https://example.com/icons/test.svg',
        ]);
        Category::create([
            'name' => 'Monitoring',
            'color' => '#3b3131ff',
            'icon_url' => 'https://example.com/icons/test.svg',
        ]);
        Category::create([
            'name' => 'Watching',
            'color' => '#3a0404ff',
            'icon_url' => 'https://example.com/icons/test.svg',
        ]);
        Category::create([
            'name' => 'Learning',
            'color' => '#433f3fff',
            'icon_url' => 'https://example.com/icons/test.svg',
        ]);
        Category::create([
            'name' => 'Helping',
            'color' => '#391717ff',
            'icon_url' => 'https://example.com/icons/test.svg',
        ]);
    }
}
