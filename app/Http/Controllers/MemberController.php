<?php

// MemberController.php

namespace App\Http\Controllers;

use DB;
use App\Models\User;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MemberController extends Controller
{
    public function showMembers()
{
    $users = User::where('roles', 'member')->get(); // Retrieve only members data from the database
    return view('admin.member', compact('users')); // Pass user data to the view
}


    public function dashboard()
    {
        $totalMembers = User::where('roles', 'member')->count(); // Menghitung total pengguna dengan peran member
        $users = User::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(DB::raw("month_name"))
                    ->orderBy('id','ASC')
                    ->pluck('count', 'month_name');
 
        $labels = $users->keys();
        $data = $users->values();
        return view('admin.dashboard', compact('totalMembers','labels','data'));
    }

    public function statistika()
{
   // Mengambil total pemasukan dari tabel Pemasukan
// Mengambil total pemasukan dari tabel Pemasukan
$pemasukan = Pemasukan::selectRaw("SUM(jumlah_pemasukan) as total_pemasukan, MONTH(created_at) as month")
    ->whereYear('created_at', date('Y'))
    ->groupBy('month')
    ->pluck('total_pemasukan', 'month');



// Mengambil total pengeluaran dari tabel Pengeluaran
$pengeluaran = Pengeluaran::selectRaw("SUM(jumlah_pengeluaran) as total_pengeluaran, MONTH(created_at) as month")
->whereYear('created_at', date('Y'))
    ->groupBy('month')
    ->pluck('total_pengeluaran', 'month');




    // Menggabungkan data pemasukan dan pengeluaran menjadi satu array
    $data = [];
    foreach ($pemasukan as $month => $total) {
        $data[$month] = [
            'pemasukan' => $total,
            'pengeluaran' => isset($pengeluaran[$month]) ? $pengeluaran[$month] : 0,
        ];
    }

    // Mendapatkan label bulan
    $labels = array_keys($data);

    return view('member.dashboard', compact('labels', 'data'));
}

}
