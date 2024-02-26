<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Hive;

class HiveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Hive::factory()->count(5)->create(['farm_id' => 1]);
        Hive::factory()->count(20)->create();
    }
}
