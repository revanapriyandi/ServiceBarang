<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('pages.admin.view', [
            'admin' => User::where('role', 'admin')->get()
        ]);
    }

    public function store(AdminRequest $request)
    {
        $request->validated();

        $user = User::create([
            'uid' => $request->idadmin,
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt('password'),
            'role' => 'admin'
        ]);
        session()->flash('success', 'Admin berhasil ditambahkan');
        return response()->json(200);
    }

    public function show($id)
    {
        $admin = User::find($id);
        return response()->json($admin);
    }

    public function update(AdminRequest $request, User $admin)
    {
        $admin->update([
            'uid' => $request->idadmin,
            'name' => $request->name,
            'email' => $request->email,
        ]);

        session()->flash('success', 'Admin berhasil diubah');
        return response()->json(200);
    }

    public function destroy(User $admin)
    {
        if ($admin->id == auth()->user()->id) {
            return redirect()->route('admin.index')->with('error', 'Admin tidak dapat dihapus, karena sedang login');
        }
        $admin->delete();

        return redirect()->route('admin.index')->with('success', 'Admin berhasil dihapus');
    }
}
