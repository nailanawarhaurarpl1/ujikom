<?php

namespace App\Http\Controllers;

use App\Models\User;
use Dotenv\Validator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use function Laravel\Prompts\alert;

class LoginController extends Controller
{
    public function login()
    {
        return view('login-member');
    }
    public function loginweb(Request $request)
    {
        try {
            $credentials = $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);
            
            if (Auth::attempt($credentials)) {
                 if(Auth::user()->roles == 'admin'){
                    
                    return redirect('/admin/dashboard')->with('success', 'Login berhasil');
    
                 } else if(Auth::user()->roles == 'member'){
                    return redirect('/member/dashboard')->with('success', 'Login berhasil');
                 }
            } else {
                // Redirect back with error message
                return redirect()->back()->with('error', 'Gagal masuk, periksa kembali email dan sandi.');
            }
        } catch (\Throwable $th) {
            dd($th);
        }
    }
    

    public function updateUser(Request $request, User $user, $id)
    {
        $member = User::findOrFail($id);
        $member->name = $request->name;
        $member->roles = 'member';
        $member->email = $request->email;
        $member->password = Hash::make($request->password);
        $member->save();
        $respon = [
            'success' => true,
            'data' => $member,
            'message' => 'Data Berhasil Di Tambah'
        ];
        return response()->json($respon, 200);
    }



    public function register(Request $request)
    {
        $register = new User();
        $register->email = $request->email;
        $register->name = $request->name;
        $register->password = Hash::make($request['password']);
        $register->roles = 'member';
        $register->save();
        return redirect('/login-member');
    }
}
