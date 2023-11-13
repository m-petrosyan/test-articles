<?php

namespace Database\Factories;

use App\Models\User;
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
        $title = $this->faker->unique()->sentence(3);
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'image' => $this->faker->imageUrl(640, 480),
            'title' => $title,
            'slug' => str($title)->slug(),
            'description' => $this->faker->text(200),
            'created_at' => $this->faker->dateTime,
        ];
    }
}
