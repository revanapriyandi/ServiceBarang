<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Barang;
use App\Models\Kategori;
use App\Models\BarangMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\KonfirmasiNotification;

class KonfirmasiBarangController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = BarangMasuk::with(['barang', 'teknisi', 'kategori'])
                ->where('uid', $request->get('id_order'));

            if ($request->has('msc_barang')) {
                $barang = Barang::where('uid', $request->get('msc_barang'))->first();
                if ($barang) {
                    $query->orWhere('id_barang', $barang->id);
                } else {
                    // Jika barang tidak ditemukan, tambahkan kondisi palsu agar hasilnya kosong
                    $query->orWhere('id_barang', 0);
                }
            }

            if ($request->has('teknisi')) {
                $query->orWhere('id_teknisi', $request->get('teknisi'));
            }

            $results = [
                'data' => $query->get(),
                'kategori' => Kategori::all(),
            ];

            return response()->json($results);
        }

        return view('pages.konfirmasi.view', [
            'teknisi' => User::where('role', 'teknisi')->get(),
            'barang' => Barang::all(),
            'kategori' => Kategori::all(),
        ]);
    }

    public function updateKategori(Request $request)
    {
        $request->validate([
            'id' => 'required|array',
            'id.*' => 'exists:barang_masuks,id',
            'kategori' => 'required|array',
            'kategori.*' => 'exists:kategoris,id',
        ]);

        $ids = $request->id;
        $kategoris = $request->kategori;

        foreach ($ids as $index => $id) {
            if (isset($kategoris[$index])) {
                $data = BarangMasuk::findOrFail($id);
                $data->id_kategori = $kategoris[$index];
                $data->save();
            }
        }

        Notification::route('telegram', config('services.telegram-bot-api.channel_id'))
            ->notify(new KonfirmasiNotification($ids));

        session()->flash('success', 'Data berhasil diperbarui');
        return response()->json(['success' => true]);
    }

    public function updateBarangMasuk(Request $request, $id)
    {
        $request->validate([
            'id_order' => 'required|exists:barang_masuks,uid',
            'barang' => 'required|exists:barangs,id',
            'teknisi' => 'required|exists:users,id',
            'kategori' => 'required|exists:kategoris,id',
        ]);

        $data = BarangMasuk::findOrFail($id);
        $data->id_barang = $request->barang;
        $data->id_teknisi = $request->teknisi;
        $data->id_kategori = $request->kategori;
        $data->save();

        return response()->json(['success' => true]);
    }


    public function deleteKonfirmasi($id)
    {
        $data = BarangMasuk::findOrFail($id);
        $data->delete();

        return response()->json(['success' => true]);
    }

    public function getBarangMasuk(Request $request, $id)
    {
        $barang = BarangMasuk::findOrFail($id);

        return response()->json($barang);
    }
}
