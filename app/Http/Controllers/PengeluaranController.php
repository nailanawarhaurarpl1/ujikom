<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

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
        $pengeluaran = Pengeluaran::find($id);
        $pengeluaran->delete();
        Session::flash('success', 'Berhasil hapus data');
        return redirect('/member/pengeluaran');
        
    }



public function edit($id)
{
    $pengeluaran = Pengeluaran::find($id);
    $kategori = Kategori::all();
    return view('member.pengeluaran.editpengeluaran', compact('pengeluaran', 'kategori'));
}

    public function index()
    {

        $pengeluaran = Pengeluaran::where('id_user', Auth::user()->id)->get();
    $totalPengeluaran = $pengeluaran->sum('jumlah_pengeluaran');
    

    return view('member.pengeluaran.pengeluaran', compact('pengeluaran', 'totalPengeluaran'));


        // $pengeluaran = Pengeluaran::all();
    
        // // Menghitung total jumlah pemasukan
        // $totalPengeluaran = Pengeluaran::sum('jumlah_pengeluaran');
    
        // // Pass data pemasukan dan total jumlah pemasukan ke view
        // return view('member.pengeluaran', compact('pengeluaran', 'totalPengeluaran'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $kategori = Kategori::all();
    return view('member.pengeluaran.tambahpengeluaran', compact('kategori'));
}

    /**
     * Store a newly created resource in storage.
     */
    public function update(Request $request, $id)
{

    $pengeluaran = Pengeluaran::where('id', $id)->first();
        // Validasi request
        if (!$pengeluaran) {
            return response()->json(['message' => 'Pengeluaran tidak ditemukan'], 404);
        }
        $request->validate([
            'keterangan' => 'required|string',
            'jumlah_pengeluaran' => 'required|numeric'
        ]);
        

        // Perbarui data pemasukan
        $pengeluaran->keterangan = $request->keterangan;
        $pengeluaran->jumlah_pengeluaran = $request->jumlah_pengeluaran;
        $pengeluaran->save();

        Session::flash('success', 'Berhasil edit data');
        // Kirim respons berhasil
        return redirect('/member/pengeluaran');



   

    // Cari pengeluaran berdasarkan ID
    // $pengeluaran = Pengeluaran::findOrFail($id);

    // Perbarui atribut pengeluaran dengan data baru
    // $pengeluaran->keterangan = $validatedData['keterangan'];
    // $pengeluaran->id_kategori = $validatedData['id_kategori'];
    // $pengeluaran->jumlah_pengeluaran = $validatedData['jumlah_pengeluaran'];
    // // $pemasukan->tanggal = $request->input('tanggal');
    // $pengeluaran->save();

    // Berikan respons JSON
    // return response()->json([
    //     'message' => 'Pengeluaran berhasil diperbarui',
    //     'data' => $pengeluaran
    // ], 200);

    return redirect('/member/pengeluaran');
}

    
     
    public function store(Request $request)
{
    // Validasi input
    $validatedData = $request->validate([
        'keterangan' => 'required|string',
        // 'id_kategori' => 'required|exists:kategoris,id',
        'jumlah_pengeluaran' => 'required|integer',
    ]);

    // Buat instance Pengeluaran
    $pengeluaran = new Pengeluaran();
    $pengeluaran->keterangan = $validatedData['keterangan'];
    // $pengeluaran->id_kategori = $validatedData['id_kategori'];
    $pengeluaran->jumlah_pengeluaran = $validatedData['jumlah_pengeluaran'];
    $pengeluaran->id_user = auth()->id();
    // $pengeluaran->tanggal = $request->input('tanggal');
    $pengeluaran->save();
    Session::flash('success', 'Berhasil tambah data');
    return redirect('/member/pengeluaran');




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
