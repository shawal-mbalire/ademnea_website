<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FarmerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fname' => $this->faker->firstName,
            'lname' => $this->faker->lastName,
            'gender' => $this->faker->randomElement(['male', 'female']), 
            'email' => $this->faker->unique()->safeEmail,
            'password' => $this->faker->password,
            'address' => $this->faker->address,
            'telephone' => $this->faker->phoneNumber,
        ];
    }
}
