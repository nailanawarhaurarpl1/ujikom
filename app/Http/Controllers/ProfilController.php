<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    public function index()
{
    $profil = User::where('id', Auth::user()->id)->get();
    return view('member.profil', compact('profil'));
}

    public function updateprofil(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required', // Sesuaikan validasi sesuai kebutuhan Anda
        ]);

        // Perbarui data pengguna
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        // Redirect kembali ke halaman profil dengan pesan sukses
        return redirect('/profil')->with('success', 'Profil berhasil diperbarui.');
    }
}
