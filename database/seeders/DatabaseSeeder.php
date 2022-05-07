<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vehicle;

class DatabaseSeeder extends Seeder
{
    /**
     * Create one vehicle
     *
     * @return void
     */
    public function run()
    {
        Vehicle::factory(1)->create();
    }
}
