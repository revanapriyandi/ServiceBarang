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
        $teknisi = optional(User::where('role', 'teknisi')->inRandomOrder()->first())->id;
        $barang = optional(Barang::inRandomOrder()->first())->id;
        $kategori = optional(Kategori::inRandomOrder()->first())->id;

        return [
            'uid' => sprintf('KBH-%04d-%02d', $this->faker->randomNumber(4), $this->faker->randomNumber(2)),
            'msc_barang' => sprintf('MSC-%04d-%02d', $this->faker->randomNumber(4), $this->faker->randomNumber(2)),
            'id_teknisi' => $teknisi,
            'id_barang' => $barang,
            'id_kategori' => $kategori,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
