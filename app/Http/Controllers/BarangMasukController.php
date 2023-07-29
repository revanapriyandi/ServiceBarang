<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Barang;
use App\Models\History;
use App\Models\Kategori;
use App\Models\BarangMasuk;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    public function history(Request $request)
    {
        $tanggal = $request->input('tanggal');
        $teknisi = $request->input('teknisi');
        $id_order = $request->input('id_order');
        $kategori = $request->input('kategori');
        $barang = $request->input('barang');

        $barangMasuk = $this->getBarangMasukData($tanggal, $teknisi, $id_order, $kategori, $barang);
        $history = $this->getHistoryData($tanggal, $teknisi, $id_order, $kategori, $barang);

        $mergedData = $this->mergeAndDistinctData($barangMasuk, $history);

        return view('pages.barangMasuk.history', [
            'barangMasuk' => $mergedData,
            'teknisi' => User::where('role', 'teknisi')->get(),
            'kategori' => Kategori::all(),
            'barang' => Barang::all(),
        ]);
    }

    private function getBarangMasukData($tanggal, $teknisi, $id_order, $kategori, $barang)
    {
        return BarangMasuk::with(['kategori', 'teknisi', 'barang'])
            ->where('id_kategori', '!=', null)
            ->when($tanggal, function ($query, $tanggal) {
                return $query->whereDate('created_at', date('Y-m-d', strtotime($tanggal)));
            })
            ->when($teknisi, function ($query, $teknisi) {
                return $query->where('id_teknisi', $teknisi);
            })
            ->when($id_order, function ($query, $id_order) {
                return $query->where('id_order', 'like', '%' . $id_order . '%');
            })
            ->when($kategori, function ($query, $kategori) {
                return $query->where('id_kategori', $kategori);
            })
            ->when($barang, function ($query, $barang) {
                return $query->where('id_barang', $barang);
            })
            ->get();
    }

    private function getHistoryData($tanggal, $teknisi, $id_order, $kategori, $barang)
    {
        return History::with(['kategori', 'teknisi', 'barang'])
            ->when($tanggal, function ($query, $tanggal) {
                return $query->whereDate('created_at', date('Y-m-d', strtotime($tanggal)));
            })
            ->when($teknisi, function ($query, $teknisi) {
                return $query->where('id_teknisi', $teknisi);
            })
            ->when($id_order, function ($query, $id_order) {
                return $query->where('id_order', 'like', '%' . $id_order . '%');
            })
            ->when($kategori, function ($query, $kategori) {
                return $query->where('id_kategori', $kategori);
            })
            ->when($barang, function ($query, $barang) {
                return $query->where('id_barang', $barang);
            })
            ->get();
    }

    private function mergeAndDistinctData($barangMasuk, $history)
    {
        return $barangMasuk->concat($history)->unique();
    }
}
