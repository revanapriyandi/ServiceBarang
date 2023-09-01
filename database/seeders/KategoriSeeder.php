<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kategoris')->updateOrInsert(
            ['id' => 1],
            [
                'name' => 'Selesai',
                'desc' => 'Proses servis sudah selesai dengan kondisi bagus.',
            ]
        );

        DB::table('kategoris')->updateOrInsert(
            ['id' => 2],
            [
                'name' => 'AWP',
                'desc' => 'Proses servis sudah membelikan komponen namun sulit ditemukan.',
            ]
        );

        DB::table('kategoris')->updateOrInsert(
            ['id' => 3],
            [
                'name' => 'OOC',
                'desc' => 'Proses servis sedang berlangsung dan sedang menunggu komponen.',
            ]
        );

        DB::table('kategoris')->updateOrInsert(
            ['id' => 4],
            [
                'name' => 'Unrepair',
                'desc' => 'Barang tidak dapat diperbaiki',
            ]
        );
    }
}
