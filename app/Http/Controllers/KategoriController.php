<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KategoriController extends Controller
{



    public function edit($id)
    {
        $kategori = Kategori::find($id);
        return view('member.kategori.editkategori', compact('kategori'));
    }

    public function index()
    {
        $kategori = Kategori::all();
        return view('member.kategori.kategori', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    
    public function update(Request $request, $id)
    {
        $kategori = Kategori::where('id', $id)->first();
        // Validasi request
        if (!$kategori) {
            return response()->json(['message' => 'Kategori tidak ditemukan'], 404);
        }
        $request->validate([
            'nama' => 'required|string',
        ]);

        // Perbarui data pemasukan
        $kategori->nama = $request->nama;
        $kategori->save();

        // Kirim respons berhasil
        return redirect('/member/kategori');


        // // Temukan Kategori berdasarkan ID
        // $kategori = Kategori::find($id);

        // // Periksa jika kategori tidak ditemukan
        // if (!$kategori) {
        //     return response()->json(['message' => 'Kategori tidak ditemukan'], 404);
        // }
        // // Validasi input
        // $request->validate([
        //     'nama' => 'required|string',
        // ]);

        // // Update data kategori
        // $kategori->nama = $request->nama;
        // $kategori->save();
        // return redirect('member/kategori');
    }



    public function store(Request $request)
    {
        // Validasi data yang diterima dari request
        $request->validate([
            'nama' => 'required|string|max:255', // Atur aturan validasi sesuai kebutuhan
        ]);

        // Buat objek Kategori baru
        $kategori = new Kategori();
        $kategori->nama = $request->nama;
        $kategori->id_user = auth()->id();
        $kategori->save();

        return redirect('/member/kategori');
    }


    /**
     * Display the specified resource.
     */
    public function destroy($id)
    {
        $kategori = Kategori::find($id);
        $kategori->delete();
        return redirect('/member/kategori');
    }

    /**
     * Show the form for editing the specified resource.
     */


    /**
     * Update the specified resource in storage.
     */


    /**
     * Remove the specified resource from storage.
     */
}
