<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Barang;
use App\Models\Kategori;
use App\Models\BarangMasuk;
use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

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
        $oneYearAgo = Carbon::now()->subYear();
        $oneMonthAgo = Carbon::now()->subMonth();

        $tanggalSekarang = Carbon::now()->toDateString();

        $totalBarangMasukPerHari = BarangMasuk::whereDate('created_at', $tanggalSekarang)
            ->count();
        $historyBarangMasuk = History::whereBetween('created_at', [$oneMonthAgo, Carbon::now()])->count();
        $totalBarangMasukLastMonth = BarangMasuk::whereBetween('created_at', [$oneMonthAgo, Carbon::now()])->count();
        $totalBarangLastYear = Barang::whereBetween('created_at', [$oneYearAgo, Carbon::now()])->count();
        $bulanIni = Carbon::now()->startOfMonth();
        $sekarang = Carbon::now();

        $historyBarangKeluar = History::where('id_kategori', 1)
            ->whereBetween('created_at', [$bulanIni, $sekarang])
            ->count();

        $barangKeluar = BarangMasuk::where('id_kategori', 1)
            ->whereBetween('created_at', [$bulanIni, $sekarang])
            ->count();
        return view('dashboard', [
            'totalBarang' => $totalBarangLastYear,
            'totalBarangMasuk' => $totalBarangMasukLastMonth + $historyBarangMasuk,
            'teknisi' => User::where('role', 'teknisi')->count(),
            'totalBarangMasukPerHari' => $totalBarangMasukPerHari,
            'serviceName' => $serviceName,
            'barangMasukC' => $barangMasukC,
            'kategoriName' => $kategoriName,
            'kategoriMasukC' => $kategoriMasukC,
            'barangKeluar' => $barangKeluar + $historyBarangKeluar,
        ]);
    }
}
