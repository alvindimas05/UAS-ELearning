<?php

namespace Database\Factories;

use Alirezasedghi\LaravelImageFaker\ImageFaker;
use Alirezasedghi\LaravelImageFaker\Services\Picsum;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        if (!file_exists(storage_path('app/public/course-thumbnails'))) {
            mkdir(storage_path('app/public/course-thumbnails'), 0777, true);
        }

        $title = $this->faker->sentence();
        $imageFaker = new ImageFaker(new Picsum());
        return [
            'teacher_id' => User::factory(), // Defaults to creating a new user, but can be overridden
            'title' => $title,
            'slug' => Str::slug($title),
            'thumbnail' => str_replace(storage_path('app/public/'), '', $imageFaker->image(storage_path('app/public/course-thumbnails'))),
            'price' => $this->faker->numberBetween(10000, 1000000),
            'description' => $this->faker->paragraph(),
        ];
    }
}
