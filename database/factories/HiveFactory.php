<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class HiveFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'longitude' => $this->faker->randomFloat(6, 0, 180),
            'latitude' => $this->faker->randomFloat(6, 0, 180),
            'farm_id' => $this->faker->numberBetween(1,10),
        ];
    }
}
