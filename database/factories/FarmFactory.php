<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FarmFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //create farm factory from this protected $fillable = ['ownerId', 'name', 'district','address'];
            'ownerId' => $this->faker->numberBetween(1,10),
            'name' => $this->faker->company,
            'district' => $this->faker->city,
            'address' => $this->faker->address,
        ];
    }
}
