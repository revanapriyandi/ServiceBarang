<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Barang>
 */
class BarangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'uid' => 'BRG-' . $this->faker->unique()->randomNumber(6),
            'name' => $this->faker->word(),
            'desc' => $this->faker->sentence(),
            'point' => $this->faker->randomNumber(1),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
