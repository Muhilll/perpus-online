<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/home', function () {
    return view('user.home');
});


Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'proses_login'])->name('proses_login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'proses_register'])->name('proses_register');
Route::get('/activation', [AuthController::class, 'activation'])->name('activation');
Route::get('/home', [UserController::class, 'home'])->name('home');
Route::get('/buku/{id_buku}/detail', [UserController::class, 'detailBuku'])->name('buku-detail');
Route::get('/buku/{id_buku}/form-peminjaman', [UserController::class, 'formPinjam'])->name('form-peminjaman');
Route::post('/buku/proses-peminjaman', [UserController::class, 'prosesPinjam'])->name('proses-pinjam-buku');
Route::get('/buku/{id_peminjaman}/pengembalian', [UserController::class, 'prosesPengembalian'])->name('proses-pengembalian');
Route::get('/daftar-peminjaman', [UserController::class, 'daftarPinjam'])->name('daftar-peminjaman');
Route::get('/buku/rating', [UserController::class, 'rating'])->name('rating');
Route::get('/buku/{id_buku}/{id_pengembalian}/beri-rating', [UserController::class, 'beriRating'])->name('beri-rating');
Route::post('/buku/beri-rating', [UserController::class, 'prosesBeriRating'])->name('proses-beri-rating');
Route::get('/daftar-anggota', [UserController::class, 'daftar'])->name('daftar-anggota');
Route::post('/daftar-anggota', [UserController::class, 'proses_daftar'])->name('proses_daftar');
Route::get('/keanggotaan', [UserController::class, 'profil'])->name('keanggotaan');
Route::get('/edit-keanggotaan', [UserController::class, 'editProfil'])->name('edit-keanggotaan');
Route::post('/edit-keanggotaan', [UserController::class, 'prosesEditProfil'])->name('proses-edit-keanggotaan');


//<-- akun/profile
Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
Route::get('/daftar-buku', [AdminController::class, 'daftarBuku'])->name('daftar-buku');
Route::get('/tambah-buku', [AdminController::class, 'tambahBuku'])->name('tambah-buku');
Route::post('/tambah-buku', [AdminController::class, 'prosesTambahBuku'])->name('proses-tambah-buku');
Route::get('/edit-buku', [AdminController::class, 'editBuku'])->name('edit-buku');
Route::post('/edit-buku', [AdminController::class, 'prosesEditBuku'])->name('proses-edit-buku');
Route::get('/hapus-buku', [AdminController::class, 'hapusBuku'])->name('hapus-buku');
Route::get('/daftar-agt', [AdminController::class, 'daftarAgt'])->name('daftar-agt');
Route::get('/edit-agt', [AdminController::class, 'editAgt'])->name('edit-agt');
Route::post('/edit-agt', [AdminController::class, 'prosesEditAgt'])->name('proses-edit-agt');
Route::get('/tambah-user-agt', [AdminController::class, 'tambahAgt'])->name('tambah-user-agt');
Route::post('/tambah-user-agt', [AdminController::class, 'prosesTambahAgt'])->name('proses-tambah-agt');
Route::get('/hapus-agt', [AdminController::class, 'hapusAgt'])->name('hapus-agt');
Route::get('/admin/peminjaman', [AdminController::class, 'peminjaman'])->name('admin-peminjaman');
Route::get('/admin/pengembalian', [AdminController::class, 'pengembalian'])->name('admin-pengembalian');