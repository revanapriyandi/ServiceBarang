<?php

namespace App\Http\Controllers;

use App\Http\Requests\BarangRequest;
use App\Models\Barang;
use App\Models\History;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        return view('pages.barang.view', [
            'barang' => Barang::all()
        ]);
    }

    public function store(BarangRequest $request)
    {
        Barang::create([
            'uid' => $request->item_id,
            'name' => $request->name,
            'point' => $request->point,
            'desc' => $request->desc
        ]);

        session()->flash('success', 'Barang berhasil ditambahkan');
        return response()->json(200);
    }

    public function show(Barang $barang)
    {
        return response()->json($barang);
    }

    public function update(BarangRequest $request, Barang $barang)
    {
        $barang->update([
            'uid' => $request->item_id,
            'name' => $request->name,
            'point' => $request->point,
            'desc' => $request->desc
        ]);

        session()->flash('success', 'Barang berhasil diubah');
        return response()->json(200);
    }

    public function destroy(Barang $barang)
    {
        $barang->delete();

        return redirect()->back()->with('success', 'Barang berhasil dihapus');
    }
}
