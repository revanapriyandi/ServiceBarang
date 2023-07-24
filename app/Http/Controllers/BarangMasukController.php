<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangMasuk;
use App\Models\Kategori;
use App\Models\User;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    public function history(Request $request)
    {
        $tanggal = $request->input('tanggal');
        $teknisi = $request->input('teknisi');
        $orderteam = $request->input('orderteam');
        $kategori = $request->input('kategori');
        $barang = $request->input('barang');

        $barangMasuk = BarangMasuk::with(['kategori', 'teknisi', 'barang'])
            ->where('id_kategori', '!=', null)
            ->when($tanggal, function ($query, $tanggal) {
                return $query->whereDate('created_at', date('Y-m-d', strtotime($tanggal)));
            })
            ->when($teknisi, function ($query, $teknisi) {
                return $query->where('id_teknisi', $teknisi);
            })
            ->when($orderteam, function ($query, $orderteam) {
                return $query->where('orderteam', 'like', '%' . $orderteam . '%');
            })
            ->when($kategori, function ($query, $kategori) {
                return $query->where('id_kategori', $kategori);
            })
            ->when($barang, function ($query, $barang) {
                return $query->where('id_barang', $barang);
            })
            ->get();

        return view('pages.barangMasuk.history', [
            'barangMasuk' => $barangMasuk,
            'teknisi' => User::where('role', 'teknisi')->get(),
            'kategori' => Kategori::all(),
            'barang' => Barang::all(),
        ]);
    }
}
