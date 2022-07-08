<?php

namespace Database\Factories;

use App\Models\Parker;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class ParkerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Parker::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'member_number' => $this->faker->randomNumber(5, true),
            'ktp_number' => $this->faker->nik(),
            'address' => $this->faker->address(),
            'password' => Hash::make('password'), // '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'
        ];
    }
}
