<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Barang;
use App\Models\Kategori;
use App\Models\BarangMasuk;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $service = Barang::all();
        $serviceName = $service->pluck('name')->toArray();
        $barangMasukC = array();
        foreach ($service as $s) {
            $barangMasukC[] = BarangMasuk::where('id_barang', $s->id)->count();
        }

        $kategori = Kategori::all();
        $kategoriName = $kategori->pluck('name')->toArray();
        $kategoriMasukC = $kategori->map(function ($k) {
            return $k->barangMasuk()->count();
        })->toArray();
        return view('dashboard', [
            'totalBarang' => Barang::count(),
            'totalBarangMasuk' => BarangMasuk::count(),
            'teknisi' => User::where('role', 'teknisi')->count(),
            'serviceName' => $serviceName,
            'barangMasukC' => $barangMasukC,
            'kategoriName' => $kategoriName,
            'kategoriMasukC' => $kategoriMasukC,
        ]);
    }
}
