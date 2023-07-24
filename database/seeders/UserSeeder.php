<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //cek apakah tabel users kosong
        if (User::count() == 0) {
            // jika kosong maka buat data dummy
            User::factory()->create([
                'uid' => 'admin',
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('admin'),
                'role' => 'admin'
            ]);
        }
    }
}
