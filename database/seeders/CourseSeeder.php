<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\CourseContent;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 10 courses, each with 3-5 contents
        Course::factory(10)->create()->each(function ($course) {
            CourseContent::factory(rand(3, 5))->create([
                'course_id' => $course->id
            ]);
        });
    }
}
