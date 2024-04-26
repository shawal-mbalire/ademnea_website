<?php

namespace Database\Factories;

use App\Models\User;
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
        $fname = $this->faker->firstName;
        $lname = $this->faker->lastName;
    
        return [
            'user_id' => User::factory()->state([
                'name' => "$fname $lname",
                'role' => 'farmer',
            ]),
            'fname' => $fname,
            'lname' => $lname,
            'gender' => $this->faker->randomElement(['male', 'female']), 
            'address' => $this->faker->address,
            'telephone' => $this->faker->phoneNumber,
        ];
    }
}