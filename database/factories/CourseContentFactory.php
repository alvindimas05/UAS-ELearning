<?php

namespace Database\Factories;

use Alirezasedghi\LaravelImageFaker\ImageFaker;
use Alirezasedghi\LaravelImageFaker\Services\Picsum;
use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CourseContent>
 */
class CourseContentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        if (!file_exists(storage_path('app/public/course-contents'))) {
            mkdir(storage_path('app/public/course-contents'), 0777, true);
        }
        $imageFaker = new ImageFaker(new Picsum());
        return [
            'course_id' => Course::factory(),
            'title' => $this->faker->sentence(),
            'type' => $this->faker->randomElement(['video', 'text']),
            'file_path' => str_replace(storage_path('app/public/'), '', $imageFaker->image(storage_path('app/public/course-contents'))),
            'description' => $this->faker->paragraph(),
            'sort_order' => $this->faker->numberBetween(1, 100),
        ];
    }
}
