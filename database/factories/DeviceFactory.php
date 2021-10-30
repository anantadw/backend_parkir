<?php

namespace Database\Factories;

use App\Models\Device;
use Illuminate\Database\Eloquent\Factories\Factory;

class DeviceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Device::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'imei' => $this->faker->numerify('################'),
            'street_id' => $this->faker->randomElement([1, 2]),
            'section' => $this->faker->randomElement(['1', '2'])
        ];
    }
}
