<?php

namespace App\Http\Controllers;

use App\Models\Pengingat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class PengingatController extends Controller
{
    // ...

    /**
     * Store a newly created resource in storage.
     */
    // PengingatController.php

    public function index()
    {
        // Ambil data pengingat
        
    

    
        $pengingat = Pengingat::where('id_user', Auth::user()->id)->get();

        // Kirim data pengingat ke view
        return view('member.pengingat', compact('pengingat'));
    }
    public function store(Request $request)
    {
     

        // Validasi request
        $request->validate([
            'tanggal' => 'required|date',
            'catatan' => 'required|string',
        ]);

        // Simpan data ke database menggunakan model Pengingat
        $pengingat = new Pengingat();
        $pengingat->tanggal = $request->tanggal;
        $pengingat->catatan = $request->catatan;
        $pengingat->id_user = auth()->id();
        $pengingat->save();

        // Redirect atau response jika diperlukan
        Session::flash('success', 'Berhasil tambah data');
        return redirect('/member/pengingat');
    }

    public function update(Request $request, $id)
{
    // Temukan pengingat berdasarkan ID dan ID user yang sedang login
    $pengingat = Pengingat::where('id', $id)->where('id_user', auth()->id())->first();

    if (!$pengingat) {
        return back()->with('error', 'Pengingat tidak ditemukan');
    }

    // Validasi request
    $request->validate([
        'tanggal' => 'required|date',
        'catatan' => 'required|string',
    ]);

    // Perbarui data pengingat
    $pengingat->tanggal = $request->tanggal;
    $pengingat->catatan = $request->catatan;
    $pengingat->save();

    return redirect('/member/pengingat')->with('success', 'Pengingat berhasil diperbarui');
}

public function destroy($id)
    {
        $pengingat = Pengingat::find($id);
        $pengingat->delete();
        Session::flash('success', 'Berhasil hapus data');
        return redirect('/member/pengingat');
    }

}
