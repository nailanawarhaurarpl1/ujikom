<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\PengeluaranController;

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

Route::get('/register-member', function () {
    return view('register-member');
});

Route::post('/register-member', [LoginController::class, 'register']);

Route::get('/login-member', function () {
    return view('login-member');
});

Route::post('/login-member', [LoginController::class, 'loginweb']);

Route::get('/member/dashboard', function () {
    return view('member.dashboard');
});


Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});





Route::get('/pemasukan', function () {
    return view('member.pemasukan');
});

Route::get('/tambah-pemasukan', function () {
    return view('member.tambahpemasukan');
});
Route::get('/edit-pemasukan', function () {
    return view('member.editpemasukan');
});
Route::post('/member/pemasukan/post', [PemasukanController::class, 'store']);
Route::get('/pemasukan', [PemasukanController::class, 'index']);
Route::get('/pemasukan/{id}/edit', [PemasukanController::class, 'edit']);
Route::put('/pemasukan/{id}', [PemasukanController::class, 'update']);
Route::delete('/hapus-pemasukan/{id}', [PemasukanController::class, 'destroy']);




Route::get('/pengeluaran', function () {
    return view('member.pengeluaran');
});

Route::get('/tambah-pengeluaran', [PengeluaranController::class, 'create']);

Route::get('/edit-pengeluaran', function () {
    return view('member.editpengeluaran');
});
Route::post('/member/pengeluaran/post', [PengeluaranController::class, 'store']);
Route::get('/pengeluaran', [PengeluaranController::class, 'index']);
Route::get('/pengeluaran/{id}/edit', [PengeluaranController::class, 'edit']);
Route::put('/pengeluaran/{id}', [PengeluaranController::class, 'update']);
Route::delete('/hapus-pengeluaran/{id}', [PengeluaranController::class, 'destroy']);




Route::post('/member/kategori/post', [KategoriController::class, 'store']);

Route::get('/kategori', function () {
    return view('member.kategori');
});

Route::get('/tambah-kategori', function () {
    return view('member.tambahkategori');
});
Route::get('/edit-kategori', function () {
    return view('member.editkategori');
});
Route::get('/kategori', [KategoriController::class, 'index']);
Route::get('/kategori/{id}/edit', [KategoriController::class, 'edit']);
Route::put('/kategori/{id}', [KategoriController::class, 'update']);
Route::delete('/hapus-kategori/{id}', [KategoriController::class, 'destroy']);




Route::get('/pengingat', function () {
    return view('member.pengingat');
});

Route::get('/laporan', function () {
    return view('member.laporan');
});