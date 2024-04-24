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

    
}
