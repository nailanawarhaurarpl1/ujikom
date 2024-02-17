<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function destroy($id)
{
    $kategori = Kategori::findOrFail($id);
    $kategori->delete();

    return redirect('/kategori')->with('success', 'Kategori berhasil dihapus');
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
        $kategori = Kategori::find($id);
        $kategori->nama = $request->input('nama');
        $kategori->save();
    
        return redirect('/kategori')->with('success', 'Kategori berhasil diperbarui');
    }
    
     
    public function store(Request $request)
    {
        $kategori = new Kategori();
        $kategori->nama = $request->nama;
        $kategori->save();
        return redirect('/kategori');
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
