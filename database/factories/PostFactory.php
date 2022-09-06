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
    public function definition()
    {
        return [
            'user_id' => User::factory(), // id
            'category_id' => Category::factory(), // id
            'title' => $this->faker->sentence,
            'slug' => $this->faker->slug,
            'price' => $this->faker->latitude(1,200),
            'excerpt' => '<p>'.implode('<p></p>', $this->faker->paragraphs(2)) .'</p>',
            'body' => '<p>'.implode('<p></p>', $this->faker->paragraphs(6)) .'</p>',
        ];
    }
}
