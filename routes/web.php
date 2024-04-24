<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\PengingatController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();

Route::get('login-member', [LoginController::class, 'login'])->name('login');
Route::post('login-member', [LoginController::class, 'loginweb']);



Route::get('/register-member', function () {
    return view('register-member');
});
Route::post('register-member', [LoginController::class, 'register']);



// Route::get('/admin/dashboard', function () {
//     return view('admin.dashboard');
// });
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [MemberController::class, 'dashboard']);
    Route::get('/admin/member', [MemberController::class, 'showMembers']);
    Route::get('/admin/profil', function () {
        return view('admin.profil');
    });
});



Route::middleware(['auth', 'member'])->group(function () {
    
    Route::get('/member/dashboard', function () {
        return view('member.dashboard');
    });



    // kategori 
    Route::get('/member/kategori', [KategoriController::class, 'index']);
    Route::get('member/tambah-kategori', function () {
        return view('member.kategori.tambahkategori');
    });
    Route::get('/member/kategori/{id}/edit', [KategoriController::class, 'edit']);
    Route::put('/member/kategori/{id}', [KategoriController::class, 'update']);
    Route::post('/member/kategori/post', [KategoriController::class, 'store']);
    Route::delete('/hapus-kategori/{id}', [KategoriController::class, 'destroy']);
    


    //pemasukan
    Route::get('/member/pemasukan', [PemasukanController::class, 'index']);
    Route::get('/member/tambah-pemasukan', function () {
      return view('member.pemasukan.tambahpemasukan');
    });
    Route::get('/member/edit-pemasukan', function () {
        return view('member.pemasukan.editpemasukan'); 
    });
    Route::post('/member/pemasukan/post', [PemasukanController::class, 'store']);
    Route::get('/member/pemasukan/{id}/edit', [PemasukanController::class, 'edit']);
    Route::put('/member/pemasukan/{id}', [PemasukanController::class, 'update']);
    Route::delete('/member/hapus-pemasukan/{id}', [PemasukanController::class, 'destroy']);    



    //pengeluaran
    Route::get('/member/pengeluaran', [PengeluaranController::class, 'index']);
    Route::get('/member/edit-pengeluaran', function () {
        return view('member.pengeluaran.editpengeluaran');
    });
    Route::post('/member/pengeluaran/post', [PengeluaranController::class, 'store']);
    Route::get('/member/tambah-pengeluaran', [PengeluaranController::class, 'create']);
    Route::get('/member/pengeluaran/{id}/edit', [PengeluaranController::class, 'edit']);
    Route::put('/member/pengeluaran/{id}', [PengeluaranController::class, 'update']);
    Route::delete('/member/hapus-pengeluaran/{id}', [PengeluaranController::class, 'destroy']);



    //laporan
    Route::get('/member/laporan', [LaporanController::class, 'index']);
    // Route::get('/member/laporan', function () {
    //     return view('member.laporan');
    // });
    Route::post('/laporan/filter', [LaporanController::class, 'filter'])->name('filter');



    //pengingat
    Route::get('/member/pengingat', [PengingatController::class, 'index']);
    Route::post('/member/pengingat/post', [PengingatController::class, 'store']);
    Route::put('/member/pengingat/{id}', [PengingatController::class, 'update'])->name('pengingat.update');
    Route::delete('/member/hapus-pengingat/{id}', [PengingatController::class, 'destroy']);





    //profil
    Route::get('/profil', function () {
        return view('member.profil');
    });
    
});























// Route::post('/member/kategori/post', [KategoriController::class, 'store']);

// Route::get('/tambah-kategori', function () {
//     return view('member.tambahkategori');
// });
// Route::get('/edit-kategori', function () {
//     return view('member.editkategori');
// });
// Route::get('/kategori', [KategoriController::class, 'index']);
// Route::get('/kategori/{id}/edit', [KategoriController::class, 'edit']);
// Route::put('/kategori/{id}', [KategoriController::class, 'update']);
// Route::delete('/hapus-kategori/{id}', [KategoriController::class, 'destroy']);









