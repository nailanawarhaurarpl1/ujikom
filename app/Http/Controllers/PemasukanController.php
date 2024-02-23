<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemasukan;
use Illuminate\Support\Facades\Auth;

class PemasukanController extends Controller
{
    public function getAllPemasukan()
    {
        $pemasukan = Pemasukan::where('id_user', auth()->id())->get();
        return response()->json(['data' => $pemasukan], 200);
    }

    public function destroy($id)
    {
        try {
            $pemasukan = Pemasukan::where('id', $id)->where('id_user', auth()->id())->firstOrFail();
            $pemasukan->delete();
            return response()->json(['message' => 'Pemasukan berhasil dihapus'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal menghapus pemasukan'], 500);
        }
    }

    public function update(Request $request, $id)
    {
        // Temukan pemasukan berdasarkan ID dan ID user yang sedang login
        $pemasukan = Pemasukan::where('id', $id)->where('id_user', auth()->id())->firstOrFail();

        // Validasi request
        $request->validate([
            'nama' => 'required|string',
            'jumlah_pemasukan' => 'required|numeric'
        ]);

        // Perbarui data pemasukan
        $pemasukan->nama = $request->nama;
        $pemasukan->jumlah_pemasukan = $request->jumlah_pemasukan;
        $pemasukan->save();

        // Kirim respons berhasil
        return response()->json(['pemasukan' => $pemasukan], 200);
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
        return response()->json(['message' => 'Pemasukan berhasil disimpan', 'pemasukan' => $pemasukan], 201);
    }
}
