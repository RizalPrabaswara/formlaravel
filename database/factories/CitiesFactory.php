<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CitiesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->state(),
            'countries_id' => mt_rand(1, 5)
        ];
    }
}
