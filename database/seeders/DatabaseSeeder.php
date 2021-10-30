<?php

namespace Database\Seeders;

use App\Models\Device;
use App\Models\Parker;
use App\Models\Street;
use App\Models\Vehicle;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        Vehicle::create([
            'name' => 'Mobil',
            'price' => 3000
        ]);

        Vehicle::create([
            'name' => 'Motor',
            'price' => 2000
        ]);

        Street::factory(3)->create();

        Parker::factory(3)->create();

        Device::factory(3)->create();

    }
}
