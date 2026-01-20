<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CourseContent;

class CourseContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // This might be redundant if CourseSeeder already handles it, 
        // but keeping it for standalone usage or specific scenarios.
        // If run standalone, it will create new courses for each content 
        // because of the factory definition.
        
        // For now, let's just leave it empty or create a few standalone contents 
        // if that's desired, but typically we want them attached to courses.
        // Given the plan, I'll add a few standalone ones just to have the file populated correctly.
        
        CourseContent::factory(5)->create();
    }
}
