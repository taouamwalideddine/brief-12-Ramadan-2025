<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;
use App\Models\Category;
use Faker\Generator as Faker;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition()
    {
        return [
            'category_id' => Category::inRandomOrder()->first()->id,
            'type' => $this->faker->randomElement(['experience', 'recipe']),
            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraph,
            'image_url' => $this->faker->imageUrl(),
            'preparation_time' => $this->faker->numberBetween(10, 60),
            'cooking_time' => $this->faker->numberBetween(10, 60),
            'servings' => $this->faker->numberBetween(1, 10),
        ];
    }
}
