<?php

namespace Database\Factories;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class TagFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tag::class;

    /**
     * Define the model's default state.
     * 
     * gg
     *
     * @return array
     */
    public function definition()

    {
        $factory->define(Tag::class, function (Faker $faker)
        return [
            'name' => $this->faker->name(),
            'slug' => Str::random(40),
            'parent_id' => rand(1, App\Models\Tag::count()),
        ];
    }
}
