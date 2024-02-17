<?php

namespace App\Http\Controllers;

use App\Models\Pemasukan;
use App\Models\Kategori;
use Illuminate\Http\Request;

class PemasukanController extends Controller
{
    public function destroy($id)
{
    $pemasukan = Pemasukan::findOrFail($id);
    $pemasukan->delete();

    return redirect('/pemasukan')->with('success', 'Pemasukan berhasil dihapus');
}


    public function edit($id)
    {
        $pemasukan = Pemasukan::find($id);
        return view('member.editpemasukan', compact('pemasukan'));
    }

    public function index()
    {
        $pemasukan = Pemasukan::all();
    
        // Menghitung total jumlah pemasukan
        $totalPemasukan = Pemasukan::sum('jumlah_pemasukan');
    
        // Pass data pemasukan dan total jumlah pemasukan ke view
        return view('member.pemasukan', compact('pemasukan', 'totalPemasukan'));
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
        $pemasukan = Pemasukan::find($id);
        $pemasukan->nama = $request->input('nama');
        $pemasukan->jumlah_pemasukan = $request-> input('jumlah_pemasukan');
        // $pemasukan->tanggal = $request->inpu('tanggal');
        $pemasukan->save();
    
        return redirect('/pemasukan')->with('success', 'Pemasukan berhasil diperbarui');
    }
    
     
    public function store(Request $request)
    {
        $pemasukan = new Pemasukan();
        $pemasukan->nama = $request->nama;
        $pemasukan->jumlah_pemasukan = $request->input('jumlah_pemasukan');
        // $pemasukan->tanggal = $request->input('tanggal');
        $pemasukan->save();
        return redirect('/pemasukan');
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
