<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\HiveTemperature;

class HiveTemperatureFactory extends Factory
{
    /**
     * Define the model's default state.
     * 
     *
     * @return array
     */

    protected $model = HiveTemperature::class;

    public function definition()
    {   
        $exteriorTemp = $this->faker->randomFloat(1, 20, 40);
        $broodTemp = $this->faker->randomFloat(1, 20, 40);
        $honeyTemp = $this->faker->randomFloat(1, 20, 40);
    
        $record = implode('*', [$exteriorTemp, $broodTemp, $honeyTemp]);
    
        return [
            'record' => $record,
            'hive_id' => $this->faker->numberBetween(1, 25),
            'created_at' => $this->faker->dateTimeBetween('-60 days', 'now'),
        ];
    }
}
