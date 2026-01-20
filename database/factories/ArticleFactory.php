<?php

namespace Database\Factories;

use Alirezasedghi\LaravelImageFaker\ImageFaker;
use Alirezasedghi\LaravelImageFaker\Services\Picsum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        if (!file_exists(storage_path('app/public/articles'))) {
            mkdir(storage_path('app/public/articles'), 0777, true);
        }
        $imageFaker = new ImageFaker(new Picsum());
        return [
            'title' => $this->faker->sentence(),
            'content' => $this->faker->paragraphs(3, true),
            'category' => $this->faker->word(),
            'image' => str_replace(storage_path('app/public/'), '', $imageFaker->image(storage_path('app/public/articles'))),
        ];
    }
}
