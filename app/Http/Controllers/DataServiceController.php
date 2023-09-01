<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Barang;
use App\Models\History;
use App\Models\BarangMasuk;
use App\Models\HistoryTeknisi;
use Illuminate\Http\Request;

class DataServiceController extends Controller
{
    public function index()
    {
        $data = User::with(['barangMasuk'])->where('role', 'teknisi')->get();

        $data = $data->map(function ($item) {
            return $this->calculateData($item);
        });

        return view('pages.service.view', [
            'data' => $data
        ]);
    }

    public function restartData()
    {
        $barangMasuk = BarangMasuk::where('id_kategori', '!=', null)
            ->get();

        foreach ($barangMasuk as $item) {
            History::create([
                'uid' => $item->uid,
                'msc_barang' => $item->msc_barang,
                'id_teknisi' => $item->id_teknisi,
                'id_barang' => $item->id_barang,
                'id_kategori' => $item->id_kategori,
                'created_at' => $item->created_at,
            ]);

            BarangMasuk::where('id', $item->id)->delete();
        }

        $teknisiData = User::with(['barangMasuk'])->where('role', 'teknisi')->get();

        foreach ($teknisiData as $teknisi) {
            $data = $this->calculateData($teknisi);

            $modul = [
                'diterima' => $data['diterima'],
                'selesai' => $data['selesai'],
                'awp' => $data['awp'],
                'ooc' => $data['ooc'],
                'sisa' => $data['sisa'],
            ];

            $point = $teknisi->point ?? 0;
            HistoryTeknisi::create([
                'id_teknisi' => $teknisi->id,
                'modul' => json_encode($modul),
                'performance' => $data['performa'],
                'target' => $data['target'],
                'status' => $teknisi->status,
                'point' => $point,
                'pendapatan' => $point * config('app.pendapatan_per_point'),
            ]);

            $teknisi->update([
                'status' => 0,
                'point' => 0,
            ]);
        }

        return response()->json(['message' => 'Data migration and recalculation completed.'], 200);
    }

    private function calculateData($item)
    {
        $diterima = $item->barangMasuk->count();
        $selesai = $this->countByKategori($item, 1);
        $awp = $this->countByKategori($item, 2);
        $ooc = $this->countByKategori($item, 3);
        $unrepair = $this->countByKategori($item, 4);

        $sisa = $diterima - ($selesai + $awp + $ooc + $unrepair);
        $jumlah = $selesai + $awp + $ooc + $unrepair;
        $performa = $diterima != 0 ? round(($jumlah / $diterima) * 100, 2) : 0;

        $target = 95;
        $status = 'Tidak Tercapai';
        if ($performa >= 95) {
            // $target = 100;
            $status = 'Tercapai';
        }

        $idBarang = $item->barangMasuk->where('id_kategori', '!=', 4)->where('id_kategori', '!=', null)->pluck('id_barang')->toArray();
        //ambil point dari barang
        $point = 0;
        foreach ($idBarang as $id) {
            $barang = Barang::where('id', $id)->first();
            $point += $barang->point;
        }

        User::where('id', $item->id)->update([
            'status' => $status == 'Tercapai' ? 1 : 0,
        ]);

        return [
            'user' => $item,
            'diterima' => $diterima,
            'selesai' => $selesai,
            'awp' => $awp,
            'ooc' => $ooc,
            'unrepair' => $unrepair,
            'sisa' => $sisa,
            'performa' => $performa,
            'target' => $target,
            'status' => $status,
            'point' => $point,
        ];
    }

    private function countByKategori($item, $kategori)
    {
        return $item->barangMasuk->filter(function ($barangMasuk) use ($kategori) {
            return $barangMasuk->id_kategori == $kategori;
        })->count();
    }
}
