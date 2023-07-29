<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Barang;
use App\Models\Kategori;
use App\Models\BarangMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\KonfirmasiNotification;
use Exception;

class KonfirmasiBarangController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = BarangMasuk::with(['barang', 'teknisi', 'kategori'])
                ->where('uid', $request->get('id_order'));

            if ($request->has('uid_barang')) {
                $barang = Barang::where('uid', $request->get('uid_barang'))->first();
                if ($barang) {
                    $query->orWhere('id_barang', $barang->id);
                } else {
                    $query->orWhere('id_barang', 0);
                }
            }

            if ($request->has('msc_barang')) {
                $query->orWhere('msc_barang', $request->get('msc_barang'));
            }

            if ($request->has('teknisi')) {
                $query->orWhere('id_teknisi', $request->get('teknisi'));
            }

            $results = [
                'data' => $query->orderBy('created_at', 'desc')->get(),
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

        $point = 0;
        $id_teknisi = 0;
        $id_barang = [];
        foreach ($ids as $index => $id) {
            if (isset($kategoris[$index])) {
                $data = BarangMasuk::with('barang')->findOrFail($id);
                $data->id_kategori = $kategoris[$index];
                $data->update();

                $id_teknisi = $data->id_teknisi;
                if ($data->id_kategori != 4 && $data->id_kategori != null) {
                    $id_barang[] = $data->barang->id;
                }
            }
        }

        $point = Barang::whereIn('id', $id_barang)->sum('point');
        $user = User::find($id_teknisi);
        if ($user) {
            $user->point = $point;
            $user->update();
        }

        try {
            Notification::route('telegram', config('services.telegram-bot-api.channel_id'))
                ->notify(new KonfirmasiNotification($ids));
        } catch (Exception $e) {
            session()->flash('error', 'Terjadi kesalahan saat mengirim notifikasi');
        }

        session()->flash('success', 'Data berhasil diperbarui');
        return redirect()->back();
    }

    private function countByKategori($item, $kategori)
    {
        return $item->filter(function ($barangMasuk) use ($kategori) {
            return $barangMasuk->id_kategori == $kategori;
        })->count();
    }

    public function updateBarangMasuk(Request $request, $id)
    {
        $request->validate([
            'id_order' => 'required|exists:barang_masuks,uid',
            'msc_barang' => 'required',
            'barang' => 'required|exists:barangs,id',
            'teknisi' => 'required|exists:users,id',
            'kategori' => 'required|exists:kategoris,id',
        ]);

        $data = BarangMasuk::findOrFail($id);
        if ($data->id_teknisi != $request->teknisi) {
            $user = User::find($data->id_teknisi);
            if ($user) {
                $user->point = $user->point - $data->barang->point;
                $user->update();
            }

            if ($request->kategori != 4) {
                $user = User::find($request->teknisi);
                if ($user) {
                    $user->point = $user->point + $data->barang->point;
                    $user->update();
                }
            }
        }

        $data->uid = $request->id_order;
        $data->msc_barang = $request->msc_barang;
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
