<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::get()->random()->id,
            'title' => fake()->realText(20),
            'content' => fake()->realText(1500),
            'category_id' => Category::get()->random()->id,
            'preview_image' => 'images/522gKucmfW8NOgOaP0v2yYwrcwEa0RXfNIRXYxln.jpg',
            'main_image' => 'images/522gKucmfW8NOgOaP0v2yYwrcwEa0RXfNIRXYxln.jpg'
        ];
    }
}
