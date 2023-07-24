<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Barang;
use App\Models\BarangMasuk;
use Illuminate\Http\Request;
use App\Notifications\BarangMasukNotification;
use Illuminate\Support\Facades\Notification;

class InputBarangController extends Controller
{
    public function index()
    {
        $teknisi = User::where('role', 'teknisi')->get();

        return view('pages.service.input-barang', [
            'teknisi' => $teknisi,
            'barang' => Barang::all(),
        ]);
    }

    public function getTeknisiData($id)
    {
        if (request()->ajax()) {
            $teknisi = User::findOrFail($id);
            $teknisi->status = $teknisi->status == 1 ? 'Tercapai' : 'Tidak Tercapai';
            return response()->json($teknisi);
        }
    }

    public function getBarangData()
    {
        if (request()->ajax()) {
            $term = request('term');
            $barang = Barang::where('name', 'like', '%' . $term . '%')
                ->orWhere('uid', 'like', '%' . $term . '%')
                ->get();
            return response()->json($barang);
        }
    }

    public function storeTemporary(Request $request)
    {
        $request->validate([
            'barang' => ['required', 'exists:barangs,uid'],
            'teknisi' => ['required', 'exists:users,id'],
            'id_order' => ['required'],
        ]);

        $dateTemp = session('data_temporary', []);

        $dateTemp[] = [
            'barang' => $request->barang,
            'teknisi' => $request->teknisi,
            'id_order' => $request->id_order,
            'created_at' => now()
        ];

        session(['data_temporary' => $dateTemp]);

        return redirect()->back()->with('success', 'Barang berhasil ditambahkan');
    }

    public function deleteTemporary($id)
    {
        $dataTemp = session('data_temporary', []);
        unset($dataTemp[$id]);
        session(['data_temporary' => $dataTemp]);
        return redirect()->back()->with('success', 'Barang berhasil dihapus');
    }

    public function storeService()
    {
        try {
            $dataTemp = session('data_temporary', []);
            foreach ($dataTemp as $data) {
                $barang = Barang::where('uid', $data['barang'])->first();
                BarangMasuk::create([
                    'uid' => $data['id_order'],
                    'id_barang' => $barang->id,
                    'id_teknisi' => $data['teknisi'],
                ]);
            }
            Notification::send(User::class, new BarangMasukNotification($dataTemp));

            session()->forget('data_temporary');

            return redirect()->back()->with('success', 'Data berhasil ditambahkan');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Mengalami kesalahan:' . $e->getMessage());
        }
    }

    public function updateTemporary(Request $request, $id)
    {
        $dataTemp = session('data_temporary', []);

        foreach ($dataTemp as $key => $item) {
            if ($key == $id) {
                $dataTemp[$key]['teknisi'] = $request['data']['teknisi'];
                $dataTemp[$key]['id_order'] = $request['data']['id_order'];
                $dataTemp[$key]['barang'] = $request['data']['barang'];
            }
        }

        session(['data_temporary' => $dataTemp]);


        return response()->json(['message' => 'Data berhasil diubah']);
    }
}
