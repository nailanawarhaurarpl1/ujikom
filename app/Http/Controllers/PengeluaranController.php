<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use App\Models\Kategori;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    public function destroy($id)
{
    $pengeluaran = Pengeluaran::findOrFail($id);
    $pengeluaran->delete();

    return redirect('/pengeluaran')->with('success', 'Pengeluaran berhasil dihapus');
}


    public function edit($id)
    {
        $pengeluaran = Pengeluaran::find($id);
        $kategori = Kategori::all();
        return view('member.editpengeluaran', compact('pengeluaran','kategori'));
    }

    public function index()
    {
        // Mengambil semua data kategori dari database
        $pengeluaran = Pengeluaran::all();
        // Pass the categories to the view
        return view('member.pengeluaran', compact('pengeluaran'));
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
        $pengeluaran = Pengeluaran::find($id);
        $pengeluaran->keterangan = $request->input('keterangan');
        $pengeluaran->id_kategori = $request->id_kategori;
        $pengeluaran->jumlah_pengeluaran = $request-> input('jumlah_pengeluaran');
        // $pemasukan->tanggal = $request->input('tanggal');
        $pengeluaran->save();
    
        return redirect('/pengeluaran')->with('success', 'Pengeluaran berhasil diperbarui');
    }
    
     
    public function store(Request $request)
    {
        $pengeluaran = new Pengeluaran();
        $pengeluaran->keterangan = $request->keterangan;
        $pengeluaran->id_kategori = $request->id_kategori;
        $pengeluaran->jumlah_pengeluaran = $request->input('jumlah_pengeluaran');
        // $pemasukan->tanggal = $request->input('tanggal');
        $pengeluaran->save();
        return redirect('/pengeluaran');
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
