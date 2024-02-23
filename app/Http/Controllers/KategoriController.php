<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function getAllKategori()
{
    $kategori = Kategori::all();

    return response()->json([
        'success' => true,
        'message' => 'Berhasil mendapatkan semua data kategori.',
        'data' => $kategori
    ], 200);
}


    /**
     * Display a listing of the resource.
     */

    public function destroy($id)
{
    try {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();
        return response()->json(['message' => 'Kategori berhasil dihapus'], 200);
    } catch (\Exception $e) {
        return response()->json(['message' => 'Gagal menghapus kategori'], 500);
    }
}



    public function edit($id)
    {
        $kategori = Kategori::find($id);
        return view('member.editkategori', compact('kategori'));
    }

    public function index()
    {
        // Mengambil semua data kategori dari database
        $kategori = Kategori::all();

        // Pass the categories to the view
        return view('member.kategori', compact('kategori'));
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
    // Temukan Kategori berdasarkan ID
    $kategori = Kategori::find($id);

    // Periksa jika kategori tidak ditemukan
    if (!$kategori) {
        return response()->json(['message' => 'Kategori tidak ditemukan'], 404);
    }

    // Validasi input
    $request->validate([
        'nama' => 'required|string',
    ]);

    // Update data kategori
    $kategori->nama = $request->nama;
    $kategori->save();

    // Beri respons sukses
    return response()->json([
        'success' => true,
        'message' => 'Berhasil diperbarui.',
        'data' => $kategori
    ], 200);
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


    $formattedKategori = [
        'id' => $kategori->id,
        'nama' => $kategori->nama,
        'created_at' => $kategori->created_at,
        'updated_at' => $kategori->updated_at,
        'id_user' => $kategori->id_user
    ];

    // Kirim respons berhasil beserta data pemasukan yang disimpan dalam format JSON
    return response()->json([
        'message' => 'Pemasukan berhasil disimpan',
        'data' => $formattedKategori
    ], 201);
}


    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategori)
    {
        //
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
