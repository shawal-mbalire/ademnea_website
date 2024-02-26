<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Farmer;

class FarmerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Farmer::factory()->count(10)->create();
    }
}
