<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use App\Models\Kategori;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    public function getAllPengeluaran()
    {
        $pengeluaran = Pengeluaran::all();
        return response()->json([
            'status' => 'success',
            'data' => $pengeluaran
        ], 200);
    }
    
    public function destroy($id)
{
    try {
        $pengeluaran = Pengeluaran::findOrFail($id);
        $pengeluaran->delete();

        return response()->json([
            'message' => 'Pengeluaran berhasil dihapus',
        ], 200);
    } catch (\Exception $e) {
        return response()->json([
            'message' => 'Gagal menghapus pengeluaran',
            'error' => $e->getMessage(),
        ], 500);
    }
}



    public function edit($id)
    {
        $pengeluaran = Pengeluaran::find($id);
        $kategori = Kategori::all();
        return view('member.editpengeluaran', compact('pengeluaran','kategori'));
    }

    public function index()
    {
        $pengeluaran = Pengeluaran::all();
    
        // Menghitung total jumlah pemasukan
        $totalPengeluaran = Pengeluaran::sum('jumlah_pengeluaran');
    
        // Pass data pemasukan dan total jumlah pemasukan ke view
        return view('member.pengeluaran', compact('pengeluaran', 'totalPengeluaran'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('member.tambahpengeluaran', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function update(Request $request, $id)
{
    // Validasi input
    $validatedData = $request->validate([
        'keterangan' => 'required|string',
        'id_kategori' => 'required|exists:kategoris,id',
        'jumlah_pengeluaran' => 'required|integer',
    ]);

    // Cari pengeluaran berdasarkan ID
    $pengeluaran = Pengeluaran::findOrFail($id);

    // Perbarui atribut pengeluaran dengan data baru
    $pengeluaran->keterangan = $validatedData['keterangan'];
    $pengeluaran->id_kategori = $validatedData['id_kategori'];
    $pengeluaran->jumlah_pengeluaran = $validatedData['jumlah_pengeluaran'];
    // $pemasukan->tanggal = $request->input('tanggal');
    $pengeluaran->save();

    // Berikan respons JSON
    return response()->json([
        'message' => 'Pengeluaran berhasil diperbarui',
        'data' => $pengeluaran
    ], 200);
}

    
     
    public function store(Request $request)
{
    // Validasi input
    $validatedData = $request->validate([
        'keterangan' => 'required|string',
        'id_kategori' => 'required|exists:kategoris,id',
        'jumlah_pengeluaran' => 'required|integer',
    ]);

    // Buat instance Pengeluaran
    $pengeluaran = new Pengeluaran();
    $pengeluaran->keterangan = $validatedData['keterangan'];
    $pengeluaran->id_kategori = $validatedData['id_kategori'];
    $pengeluaran->jumlah_pengeluaran = $validatedData['jumlah_pengeluaran'];
    $pengeluaran->id_user = auth()->id();
    // $pemasukan->tanggal = $request->input('tanggal');
    $pengeluaran->save();



    $formattedPengeluaran = [
        'id' => $pengeluaran->id,
        'keterangan' => $pengeluaran->keterangan,
        'jumlah_penge$pengeluaran' => $pengeluaran->jumlah_pengeluaran,
        'id_kategori' => $pengeluaran->id_kategori,
        'created_at' => $pengeluaran->created_at,
        'updated_at' => $pengeluaran->updated_at,
        'id_user' => $pengeluaran->id_user
    ];

    
    return response()->json([
        'message' => 'Pengeluaran berhasil disimpan',
        'data' => $formattedPengeluaran
    ], 201);




    // Jika penyimpanan berhasil, kembalikan respons sukses
    return response()->json([
        'status' => 'success',
        'message' => 'Pengeluaran berhasil disimpan',
        'data' => $pengeluaran
    ], 201);
}


    /**
     * Display the specified resource.
     */


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
