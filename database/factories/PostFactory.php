<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text(50),
            'slug' => $this->faker->text(30),
            'body' => $this->faker->text(300),
            'excerpt' => $this->faker->text(200),
            'status' => $this->faker->randomElement(['published', 'pending', 'draft']),
            'user_id' => $this->faker->randomElement(User::pluck('id')->toArray()),
            // 'user_id' => User::factory(),
        ];
    }
}
