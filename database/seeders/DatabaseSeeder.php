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
        User::factory(10)->create();
        Barang::factory(30)->create();
        BarangMasuk::factory(30)->create();

        //perbaharui point teknisi
        $teknisi = User::where('role', 'teknisi')->get();
        foreach ($teknisi as $key => $value) {
            $barangMasuk = BarangMasuk::with('barang')->where('id_teknisi', $value->id)->get();

            $point = 0;
            foreach ($barangMasuk as $key => $bm) {
                $point += $bm->barang->point;
            }

            $value->update([
                'point' => $point,
            ]);
        }
    }
}
