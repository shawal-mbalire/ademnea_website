<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Farm;

class FarmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Farm::factory()->count(5)->create(['ownerId' => 1]);
        Farm::factory()->count(20)->create();
    }
}
