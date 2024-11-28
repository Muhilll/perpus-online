<?php

namespace App\Http\Controllers;

use App\Models\anggota;
use App\Models\buku;
use App\Models\peminjaman;
use App\Models\pengembalian;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(){
        return view('admin.dashboard');
    }

    public function daftarBuku(){
        $daftarBuku = buku::all();
        $no = 0;

        return view('admin.buku.daftar-buku', compact('daftarBuku', 'no'));
    }


    public function tambahBuku(){
        return view('admin.buku.tambah');
    }

    public function prosesTambahBuku(Request $request){
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'deskripsi' => 'required',
            'kategori' => 'required',
            'tahun_terbit' => 'required',
            'jumlah_ketersediaan' => 'required',
        ]);

        buku::create($request->all());

        return redirect()->intended('/daftar-buku');
    }

    public function editBuku(Request $request){
        $request->validate([
            'id_buku' => 'required',
        ]);

        $dataBuku = buku::find($request->id_buku);

        return view('admin.buku.edit', compact('dataBuku'));
    }

    public function prosesEditBuku(Request $request){
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'deskripsi' => 'required',
            'kategori' => 'required',
            'tahun_terbit' => 'required',
            'jumlah_ketersediaan' => 'required',
        ]);

        $buku = Buku::find($request->id_buku);
        $buku->update($request->all());

        return redirect()->intended('/daftar-buku');
    }

    public function hapusBuku(Request $request){
        $buku = Buku::find($request->id_buku);
        $buku->delete();

        return redirect()->intended('/daftar-buku');
    }

    public function daftarAgt(){
        $dataAgt = anggota::all();
        $no = 0;

        return view('admin.agt.daftar-agt', compact('dataAgt', 'no'));
    }

    public function editAgt(Request $request){
        $request->validate([
            'id_anggota' => 'required',
        ]);

        $dataAgt = anggota::find($request->id_anggota);
        return view('admin.agt.edit', compact('dataAgt'));
    }

    public function prosesEditAgt(Request $request){
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'jkl' => 'required',
            'alamat' => 'required',
        ]);

        $anggota = anggota::find($request->id_anggota);
        $anggota->nama = $request->nama;
        $anggota->email = $request->email;
        $anggota->jkl = $request->jkl;
        $anggota->alamat = $request->alamat;
        $anggota->save();

        return redirect()->intended('/daftar-agt');
    }

    public function tambahAgt(){
        return view('admin.agt.tambah');
    }

    public function prosesTambahAgt(Request $request){
        $request->validate([
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'nama' => 'required',
            'jkl' => 'required',
            'alamat' => 'required'
        ]);

        $activation_token = bin2hex(random_bytes(16));

        $user = new User();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->activation_token = $activation_token;
        $user->is_active = 1;
        $user->save();

        $dataUser = User::where('activation_token', $activation_token)->first();

        $anggota = new anggota();
        $anggota->id_user = $dataUser->id_user;
        $anggota->nama = $request->nama;
        $anggota->email =$dataUser->email;
        $anggota->jkl = $request->jkl;
        $anggota->alamat = $request->alamat;
        $anggota->save();

        return redirect()->intended('/daftar-agt');
    }

    public function hapusAgt(Request $request){
        $agt = anggota::find($request->id_anggota);
        $agt->delete();

        return redirect()->intended('/daftar-agt');
    }

    public function peminjaman(){

        $no = 0;
        $dataPeminjaman = peminjaman::all();

        return view('admin.peminjaman.daftar-peminjaman', compact('dataPeminjaman', 'no'));
    }

    public function pengembalian(){

        $no = 0;
        $dataPengembalian = pengembalian::leftjoin('peminjamen', 'pengembalians.id_peminjaman', 'peminjamen.id_peminjaman')
        ->leftjoin('bukus', 'peminjamen.id_buku', 'bukus.id_buku')
        ->leftjoin('anggotas', 'peminjamen.id_anggota', 'anggotas.id_anggota')
        ->select('anggotas.nama', 'bukus.judul', 'pengembalians.tanggal_pengembalian', 'pengembalians.denda')
        ->get();

        return view('admin.pengembalian.daftar-pengembalian', compact('dataPengembalian', 'no'));
    }
}
