<?php

namespace Database\Factories;

use App\Models\Translation;
use Illuminate\Database\Eloquent\Factories\Factory;

class TranslationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Translation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'table' => $this->faker->text(50),
            'row' => $this->faker->numberBetween($min = 50, $max = 500),
            'column' => $this->faker->text(50),
            'value' => $this->faker->text(300)
        ];
    }
}
