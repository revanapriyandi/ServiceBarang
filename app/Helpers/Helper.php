<?php

namespace App\Helpers;

class Helper
{
    public static function formatRupiah($angka)
    {
        $hasil_rupiah = "Rp. " . number_format($angka, 0, ',', '.');
        return $hasil_rupiah;
    }
}
