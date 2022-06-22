<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => bcrypt('password'),
            'phone_number' => $this->faker->unique()->randomNumber(5, true),
            'address' => $this->faker->address,
            'role' => $this->faker->randomElement([
                'Mahasiswa',
                'Pembina Lab',
                'Kordinator Asisten',
                'Wakil Kordinator Asisten',
                'Humas',
                'Sekretaris',
                'Inventaris',
                'Bendahara'
            ])
        ];
    }
}
