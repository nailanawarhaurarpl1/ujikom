<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengeluaran;
use App\Models\Pemasukan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PemasukanController extends Controller
{

    public function index()
{
    $pemasukan = Pemasukan::where('id_user', Auth::user()->id)->get();
    $totalPemasukan = $pemasukan->sum('jumlah_pemasukan');
    $pengeluaran = Pengeluaran::all(); // Mengambil semua data pengeluaran

    return view('member.pemasukan.pemasukan', compact('pemasukan', 'totalPemasukan', 'pengeluaran')); // Mengirimkan data pemasukan dan pengeluaran ke view
}


    public function edit($id)
    {
        $pemasukan = Pemasukan::find($id);
        return view('member.pemasukan.editpemasukan', compact('pemasukan'));
    }

    public function update(Request $request, $id)
    {
        // Temukan pemasukan berdasarkan ID dan ID user yang sedang login
        $pemasukan = Pemasukan::where('id', $id)->first();
        // Validasi request
        if (!$pemasukan) {
            return response()->json(['message' => 'Pemasukan tidak ditemukan'], 404);
        }
        $request->validate([
            'nama' => 'required|string',
            'jumlah_pemasukan' => 'required|numeric'
        ]);
        

        // Perbarui data pemasukan
        $pemasukan->nama = $request->nama;
        $pemasukan->jumlah_pemasukan = $request->jumlah_pemasukan;
        $pemasukan->save();

        Session::flash('success', 'Berhasil edit data');
        // Kirim respons berhasil
        return redirect('/member/pemasukan');
    }

    public function store(Request $request)
    {

        
        // Validasi request
        $request->validate([
            'nama' => 'required|string',
            'jumlah_pemasukan' => 'required|numeric' 
        ]);

        // Simpan data pemasukan baru
        $pemasukan = new Pemasukan();
        $pemasukan->nama = $request->nama;
        $pemasukan->jumlah_pemasukan = $request->jumlah_pemasukan;
        $pemasukan->id_user = auth()->id(); // Sesuaikan dengan kebutuhan autentikasi
        $pemasukan->save();

        // Kirim respons berhasil beserta data pemasukan yang disimpan dalam format JSON
        // return response()->json(['message' => 'Pemasukan berhasil disimpan', 'pemasukan' => $pemasukan], 201);
        Session::flash('success', 'Berhasil tambah data');
        return redirect('/member/pemasukan');
    }

    public function destroy($id)
    {
        $pemasukan = Pemasukan::find($id);
        $pemasukan->delete();
        Session::flash('success', 'Berhasil hapus data');
        return redirect('/member/pemasukan');
    }
}
