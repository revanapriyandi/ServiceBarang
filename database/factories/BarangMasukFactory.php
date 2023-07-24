<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BarangMasuk>
 */
class BarangMasukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'uid' => sprintf('KBH-%04d-%02d', $this->faker->randomNumber(4), $this->faker->randomNumber(2)),
            'id_teknisi' => User::where('role', 'teknisi')->inRandomOrder()->first()->id,
            'id_barang' => Barang::inRandomOrder()->first()->id,
            'id_kategori' => Kategori::inRandomOrder()->first()->id,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
