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
use Illuminate\Contracts\Session\Session;

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

            $dataSession = session('konfirmasi_temporary', []);

            $query->whereNotIn('id', collect($dataSession)->pluck('id'));
            // Filter data dengan id yang sudah ada di session
            $data = $query->orderBy('created_at', 'desc')->get();

            $data->map(function ($item) use ($dataSession) {
                if ($item->id_kategori == null && !in_array($item->id, collect($dataSession)->pluck('id')->toArray())) {
                    $dataSession[] = [
                        'id' => $item->id,
                        'id_kategori' => 1,
                    ];

                    session(['konfirmasi_temporary' => $dataSession]);
                }
            });

            $results = [
                'data' => $data,
                'kategori' => Kategori::all(),
            ];

            return response()->json($results);
        }

        // session()->forget('konfirmasi_temporary');
        return view('pages.konfirmasi.view', [
            'teknisi' => User::where('role', 'teknisi')->get(),
            'barang' => Barang::all(),
            'kategori' => Kategori::all(),
        ]);
    }

    public function clearSessionKonfirmasi()
    {
        session()->forget('konfirmasi_temporary');

        return response()->json(['success' => true]);
    }

    public function updateKategori(Request $request)
    {
        $dataSession = session('konfirmasi_temporary', []);
        $ids = collect($dataSession)->pluck('id');
        foreach ($dataSession as $item) {
            $data = BarangMasuk::with(['barang', 'teknisi'])->findOrFail($item['id']);
            $data->id_kategori = $item['id_kategori'];
            $data->update();
        }

        $idss = $request->id;
        $mscBarang = $request->msc_barang;
        $idOrder = $request->id_order;

        $point = 0;
        $id_teknisi = 0;
        $id_barang = [];
        foreach ($idss as $index => $id) {
            $data = BarangMasuk::with('barang')->findOrFail($id);
            $data->msc_barang = $mscBarang[$index];
            $data->uid = $idOrder[$index];
            $data->update();

            $id_teknisi = $data->id_teknisi;
            if ($data->id_kategori != 4 && $data->id_kategori != null) {
                $id_barang[] = $data->barang->id;
            }
        }

        foreach ($id_barang as $id) {
            $barang = Barang::find($id);
            if ($barang) {
                $point += $barang->point;
            }
        }
        $user = User::find($id_teknisi);
        if ($user) {
            $user->point = $point;
            $user->update();
        }

        if (count($dataSession) != 0) {
            try {
                Notification::route('telegram', config('services.telegram-bot-api.channel_id'))
                    ->notify(new KonfirmasiNotification($ids));
            } catch (Exception $e) {
                session()->flash('error', 'Terjadi kesalahan saat mengirim notifikasi');
            }
        }

        session()->forget('konfirmasi_temporary');

        session()->flash('success', 'Data berhasil diperbarui');
        return redirect()->back();
    }

    private function countByKategori($item, $kategori)
    {
        return $item->filter(function ($barangMasuk) use ($kategori) {
            return $barangMasuk->id_kategori == $kategori;
        })->count();
    }

    public function updateToSession(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'kategori' => 'required',
        ]);

        $id = $request->id;
        $kategori = $request->kategori;

        $dateTemp = session('konfirmasi_temporary', []);

        $found = false;
        foreach ($dateTemp as $index => $item) {
            if ($item['id'] == $id) {
                $dateTemp[$index]['id_kategori'] = $kategori;
                $found = true;
            }
        }

        if (!$found) {
            $dateTemp[] = [
                'id' => $id,
                'id_kategori' => $kategori,
            ];
        }

        session(['konfirmasi_temporary' => $dateTemp]);

        return response()->json([
            'success' => true,
            'data' => $dateTemp,
        ]);
    }


    public function getDataKonfirmasiSession()
    {
        $data = session('konfirmasi_temporary', []);

        $data = collect($data)->map(function ($item) {
            $barangMasuk = BarangMasuk::with(['barang', 'teknisi', 'kategori'])->findOrFail($item['id']);

            $barangMasuk->id_kategori = $item['id_kategori'];
            return $barangMasuk;
        });


        $results = [
            'data' => $data,
            'kategori' => Kategori::all(),
        ];

        return response()->json($results);
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
