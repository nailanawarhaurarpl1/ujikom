<?php

namespace App\Http\Controllers;

use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    

    
        // Ambil semua data pemasukan dan pengeluaran dari database
        $pemasukan = Pemasukan::where('id_user', Auth::user()->id)->get();
        $pengeluaran = Pengeluaran::where('id_user', Auth::user()->id)->get();
        
        // Gabungkan data pemasukan dan pengeluaran ke dalam satu array
        $allData = $pemasukan->merge($pengeluaran);
        
        // Sorting data berdasarkan tanggal secara ascending (dari yang paling lama)
        $sortedData = $allData->sortBy('created_at', SORT_REGULAR, false);
        
        // Kelompokkan data berdasarkan tanggal
        $groupedData = [];
        foreach ($sortedData as $item) {
            $tanggal = $item->created_at->format('Y-m-d');
            $groupedData[$tanggal][] = ['type' => $item instanceof Pemasukan ? 'Pemasukan' : 'Pengeluaran', 'data' => $item];
        }
        
        return view('member.laporan', compact('groupedData'));
    }

    /**
     * Filter data based on start_date and end_date.
     */
    public function filter(Request $request)
    {
        // Ambil tanggal mulai dan tanggal akhir dari permintaan
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // Konversi format tanggal jika diperlukan
        $startDate = date('Y-m-d', strtotime($startDate));
        $endDate = date('Y-m-d', strtotime($endDate));

        // Ambil data pemasukan dan pengeluaran yang sesuai dengan rentang tanggal
        $pemasukan = Pemasukan::whereBetween('created_at', [$startDate . ' 00:00:00', $endDate . ' 23:59:59'])->get();
        $pengeluaran = Pengeluaran::whereBetween('created_at', [$startDate . ' 00:00:00', $endDate . ' 23:59:59'])->get();

        // Gabungkan data pemasukan dan pengeluaran ke dalam satu array
        $allData = $pemasukan->merge($pengeluaran);
        
        // Sorting data berdasarkan tanggal secara ascending (dari yang paling lama)
        $sortedData = $allData->sortBy('created_at', SORT_REGULAR, false);
        
        // Kelompokkan data berdasarkan tanggal
        $groupedData = [];
        foreach ($sortedData as $item) {
            $tanggal = $item->created_at->format('Y-m-d');
            $groupedData[$tanggal][] = ['type' => $item instanceof Pemasukan ? 'Pemasukan' : 'Pengeluaran', 'data' => $item];
        }

        // Pass data pemasukan dan pengeluaran ke view
        return view('member.laporan', compact('groupedData'));
    }
}
