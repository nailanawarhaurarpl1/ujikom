<?php

// MemberController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;
class MemberController extends Controller
{
    public function showMembers()
    {
        $users = User::all(); // Ambil semua data pengguna dari basis data
        return view('admin.member', compact('users')); // Kirim data pengguna ke tampilan
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
}
