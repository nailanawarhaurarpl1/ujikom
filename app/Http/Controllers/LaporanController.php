<?php

namespace App\Http\Controllers;

use App\Models\laporan;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index()
    {
        $pemasukan = Pemasukan::all();
        $pengeluaran = Pengeluaran::all();

        // Pass data pemasukan dan pengeluaran ke view
        return view('member.laporan', compact('pemasukan', 'pengeluaran'));
    }

    /**
     * Filter data based on start_date and end_date.
     */
    public function filter(Request $request)
    {
        // Ambil tanggal mulai dan tanggal akhir dari permintaan
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // Ambil data pemasukan dan pengeluaran yang sesuai dengan rentang tanggal
        $pemasukan = Pemasukan::whereBetween('created_at', [$startDate, $endDate])->get();
        $pengeluaran = Pengeluaran::whereBetween('created_at', [$startDate, $endDate])->get();

        // Kembalikan data dalam bentuk JSON
        return response()->json([
            'pemasukan' => $pemasukan,
            'pengeluaran' => $pengeluaran,
        ]);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(laporan $laporan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(laporan $laporan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, laporan $laporan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(laporan $laporan)
    {
        //
    }
}
