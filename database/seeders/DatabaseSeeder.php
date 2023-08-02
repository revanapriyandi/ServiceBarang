<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Barang;
use App\Models\BarangMasuk;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            KategoriSeeder::class,
        ]);

        // aktifkan ini jika ingin menggunakan data dummy
        // User::factory(10)->create();
        // Barang::factory(30)->create();
        // BarangMasuk::factory(30)->create();
    }
}
