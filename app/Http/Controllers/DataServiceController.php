<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\User;
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

    private function calculateData($item)
    {
        $diterima = $item->barangMasuk->count();
        $selesai = $this->countByKategori($item, 1);
        $awp = $this->countByKategori($item, 2);
        $ooc = $this->countByKategori($item, 3);

        $sisa = $diterima - ($selesai + $awp + $ooc);
        $jumlah = $selesai + $awp + $ooc;
        $performa = $diterima != 0 ? round((($jumlah - $sisa) / $diterima) * 100, 2) : 0;

        $target = 80;
        $status = 'Tidak Tercapai';
        if ($performa >= 80) {
            $target = 100;
            $status = 'Tercapai';
        }

        $idBarang = $item->barangMasuk->pluck('id_barang')->toArray();
        //ambil point dari barang
        $point = Barang::whereIn('id', $idBarang)->sum('point');

        User::where('id', $item->id)->update([
            'status' => $status == 'Tercapai' ? 1 : 0,
            'point' => $point,
        ]);

        return [
            'user' => $item,
            'diterima' => $diterima,
            'selesai' => $selesai,
            'awp' => $awp,
            'ooc' => $ooc,
            'sisa' => $sisa,
            'performa' => $performa,
            'target' => $target,
            'status' => $status,
        ];
    }

    private function countByKategori($item, $kategori)
    {
        return $item->barangMasuk->filter(function ($barangMasuk) use ($kategori) {
            return $barangMasuk->id_kategori == $kategori;
        })->count();
    }
}
