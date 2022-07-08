<?php

namespace Database\Seeders;

use App\Models\Device;
use App\Models\Log;
use App\Models\Parker;
use App\Models\Street;
use App\Models\Vehicle;
use Carbon\Carbon;
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
            'price' => 5000
        ]);

        Vehicle::create([
            'name' => 'Motor',
            'price' => 3000
        ]);

        Street::factory(10)->create();

        Parker::factory(10)->create();

        // Device::factory(3)->create();

        for ($i = 1; $i <= 10; $i++) {
            Log::create([
                'parker_id' => $i,
                'time' => Carbon::now()
            ]);
        }

    }
}
