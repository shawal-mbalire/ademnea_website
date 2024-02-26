<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HiveTemperature;

class HiveTemperatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create 4 records per day for the last 2 months, for each hive 1 to 5
        $date = new \DateTime();
        $date->modify('-60 days');
        $end = new \DateTime();
        $end->modify('+1 day');
        $interval = new \DateInterval('P1D');
        $daterange = new \DatePeriod($date, $interval, $end);
        foreach ($daterange as $dt) {
            for ($i = 1; $i <= 5; $i++) {
                for ($j = 0; $j <= 18; $j += 6) {
                    HiveTemperature::factory()->create([
                        'hive_id' => $i,
                        'created_at' => $dt->format("Y-m-d") . " " . sprintf('%02d', $j) . ":00:00"
                    ]);
                }
            }
        }
    }

    
}
