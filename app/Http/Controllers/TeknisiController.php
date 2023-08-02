<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Requests\TeknisiRequest;
use App\Models\Teknisi;
use App\Models\User;
use Illuminate\Http\Request;

class TeknisiController extends Controller
{
    public function index()
    {
        $teknisi = User::where('role', 'teknisi')->get();

        $teknisi = $teknisi->map(function ($t) {
            $pendapatanCalculate = $t->point * config('app.pendapatan_per_point');
            $t->pendapatan =  $pendapatanCalculate;
            $t->save();
            $t->pendapatan = Helper::formatRupiah($pendapatanCalculate);
            return $t;
        });

        return view('pages.teknisi.view', [
            'teknisi' => $teknisi
        ]);
    }

    public function store(TeknisiRequest $request)
    {
        User::create([
            'uid' => $request->idteknisi,
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt('password'),
            'role' => 'teknisi'
        ]);

        session()->flash('success', 'Teknisi berhasil ditambahkan');
        return response()->json(200);
    }

    public function generateUid()
    {
        $uid = 'TECH' . mt_rand(10000, 99999);
        $data = User::where('uid', $uid)->first();
        if ($data) {
            return $this->generateUid();
        }
        return $uid;
    }

    public function show(User $teknisi)
    {
        return response()->json($teknisi);
    }

    public function update(TeknisiRequest $request, User $teknisi)
    {
        $teknisi->update([
            'uid' => $request->idteknisi,
            'name' => $request->name,
            'email' => $request->email,
        ]);

        session()->flash('success', 'Teknisi berhasil diubah');
        return response()->json(200);
    }

    public function destroy(User $teknisi)
    {
        $teknisi->delete();

        return redirect()->back()->with('success', 'Teknisi berhasil dihapus');
    }
}
