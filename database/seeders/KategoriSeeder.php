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
        DB::table('kategoris')->insert([
            [
                'id' => 1,
                'name' => 'Selesai',
                'desc' => 'Proses servis sudah selesai dengan kondisi bagus.',
                'created_at' => Carbon::parse('2023-07-22 23:11:55'),
                'updated_at' => Carbon::parse('2023-07-22 23:20:57'),
            ],
            [
                'id' => 2,
                'name' => 'AWP',
                'desc' => 'Proses servis sudah membelikan komponen namun sulit ditemukan.',
                'created_at' => Carbon::parse('2023-07-22 23:16:10'),
                'updated_at' => Carbon::parse('2023-07-22 23:21:21'),
            ],
            [
                'id' => 3,
                'name' => 'OOC',
                'desc' => 'Proses servis sedang berlangsung dan sedang menunggu komponen.',
                'created_at' => Carbon::parse('2023-07-22 23:17:32'),
                'updated_at' => Carbon::parse('2023-07-22 23:17:32'),
            ],
            [
                'id' => 4,
                'name' => 'Unrepair',
                'desc' => 'Barang tidak dapat diperbaiki',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
