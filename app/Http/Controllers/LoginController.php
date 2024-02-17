<?php

namespace App\Http\Controllers;

use App\Models\User;
use Dotenv\Validator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    public function loginweb(Request $request){
        $credentials = $request->only('email', 'password');
    
        if (!auth()->attempt($credentials)) {
            return redirect('/login-member')->with('error', 'email atau kata sandi Anda salah.');
        }
    
        $user = auth()->user();
    
        if($user->roles == 'member') {
            return redirect()->intended('member/dashboard');
        } elseif($user->roles == 'admin') {
            return redirect()->intended('admin/dashboard');
        } else {
            return "gagal";
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

    public function loginApi()
    {
        $credentials = request(['email', 'password']);
            if (! $token = auth()->attempt($credentials)) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }
        return response()->json([
            'code' => 200,
            'data' => Auth::user(),
            'token' => $token,
        ]);
    }

    public function me() 
    {
        return response()->json(auth()->user());
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

    public function registerapi(Request $request)
    {
        $register = new User();
        $register->email = $request->email;
        $register->name = $request->name;
        $register->password = Hash::make($request['password']);
        $register->roles = 'member';
        $register->save();
        // return redirect('/login-member');
        $respon = [
            'success' => true,
            'data' => $register,
            'message' => 'Data Berhasil Di Tambah'
        ];
        return response()->json($respon, 200);
    }

//     public function register(Request $request)
// {
//     $register = new User();
//     $register->email = $request->email;
//     $register->name = $request->name;
//     $register->password = Hash::make($request['password']);
//     $register->roles = 'member';
//     $register->save();

//     // Proses pendaftaran pengguna

//     // Setelah berhasil mendaftar, perbarui jumlah pengguna
//     $totalUsers = User::count();

//     // Simpan total pengguna ke dalam tabel pengaturan
//     Setting::updateOrCreate(['key' => 'total_users'], ['value' => $totalUsers]);

//     return redirect('/login-member');
// }


    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }
    
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }

    
}
