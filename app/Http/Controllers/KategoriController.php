<?php

namespace App\Http\Controllers;

use App\Http\Requests\KategoriRequest;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        return view('pages.kategori.view', [
            'kategori' => Kategori::all()
        ]);
    }

    public function store(KategoriRequest $request)
    {
        $request->validated();

        Kategori::create([
            'name' => $request->name,
            'desc' => $request->desc
        ]);

        session()->flash('success', 'Kategori berhasil ditambahkan');
        return response()->json(200);
    }

    public function show($id)
    {
        $kategori = Kategori::find($id);
        return response()->json($kategori);
    }

    public function update(KategoriRequest $request, Kategori $kategori)
    {
        $request->validated();

        $kategori->update([
            'name' => $request->name,
            'desc' => $request->desc
        ]);

        session()->flash('success', 'Kategori berhasil diubah');
        return response()->json(200);
    }

    public function destroy(Kategori $kategori)
    {
        $kategori->delete();

        return redirect()->route('kategori.index')
            ->with('success', 'Kategori berhasil dihapus');
    }
}
