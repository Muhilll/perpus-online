<?php

namespace App\Http\Controllers;

use App\Models\anggota;
use App\Models\buku;
use App\Models\peminjaman;
use App\Models\pengembalian;
use App\Models\rating;
use App\Models\User;
use Illuminate\Http\Request;

use function Laravel\Prompts\select;

class UserController extends Controller
{
    public function home(){
        $dataBuku = buku::all();

        return view('user.home', compact('dataBuku'));
    }

    public function daftar(){
        return view('user.daftar');
    }

    public function proses_daftar(Request $request){
        $request->validate([
            'nama' => 'required',
            'jkl' => 'required',
            'alamat' => 'required',
        ]);
        $id_user = $request->session()->get('id_user');
        $user = User::find($id_user);
        $anggota = new anggota();
        $anggota->id_user = $id_user;
        $anggota->nama = $request->nama;
        $anggota->email = $user->email;
        $anggota->jkl = $request->jkl;
        $anggota->alamat = $request->alamat;
        $anggota->save();

        return redirect()->intended('/home')->with('success', 'Pendaftaran berhasil!');
    }

    public function detailBuku($id_buku, Request $request)
    {
        $dataBuku = buku::find($id_buku);
        $id_user = $request->session()->get('id_user');
        $anggota = anggota::where('id_user', $id_user)->first();
        if($anggota){
            $bisaPinjam = false;
        } else{
            $bisaPinjam = true;
        }

        return view('user.buku.detail', compact('dataBuku', 'bisaPinjam'));
    }    

    public function formPinjam($id_buku, Request $request){

        $id_user = $request->session()->get('id_user');
        $anggota = anggota::where('id_user',$id_user)->first();
        $dataBuku = buku::find($id_buku);

        $adaPinjam = peminjaman::where('id_buku', $id_buku)->where('id_anggota', $anggota->id_anggota)->where('dikembalikan',0)->first();
        if($adaPinjam){
            $isPinjam = true;
        } else{
            $isPinjam = false;
        }
        return view('user.buku.form-peminjaman', compact('dataBuku', 'anggota', 'isPinjam'));
    }

    public function prosesPinjam(Request $request){
        $request->validate([
            'id_anggota' => 'required',
            'id_buku' => 'required',
            'tanggal_jatuh_tempo' => 'required',
        ]);

        $pinjamBuku = new peminjaman();
        $pinjamBuku->id_anggota = $request->id_anggota;
        $pinjamBuku->id_buku = $request->id_buku;
        $pinjamBuku->tanggal_jatuh_tempo = $request->tanggal_jatuh_tempo;
        $pinjamBuku->save();

        return redirect()->intended('/daftar-peminjaman');
    }

    public function daftarPinjam(Request $request){
        $id_user = $request->session()->get('id_user');
        $anggota = anggota::where('id_user',$id_user)->first();
        $dataPinjaman = peminjaman::where('id_anggota', $anggota->id_anggota)->where('dikembalikan', 0)->get();

        return view('user.buku.daftar-peminjaman', compact('dataPinjaman'));
    }

    public function prosesPengembalian($id_peminjaman){

        
        $dataPeminjaman = peminjaman::find($id_peminjaman);
        $dataPeminjaman->dikembalikan = 1;
        $dataPeminjaman->save();

        $jatuhTempo = date_create($dataPeminjaman->tanggal_jatuh_tempo);
        $tanggalSekarang = date_create(date('Y-m-d'));
        $selisihHari = date_diff($jatuhTempo, $tanggalSekarang)->days;
        $keterlambatan = $tanggalSekarang > $jatuhTempo ? $selisihHari : 0;
        $dendaPerHari = 10000;
        $denda = $keterlambatan * $dendaPerHari;
        

        $dataPengembalian = new pengembalian();
        $dataPengembalian->id_peminjaman = $id_peminjaman;
        $dataPengembalian->denda = $denda;
        $dataPengembalian->save();
        
        return redirect()->intended('/daftar-peminjaman');
    }

    public function profil(Request $request){
        $id_user = $request->session()->get('id_user');

        $anggota = anggota::where('id_user',$id_user)->first();
        return view('user.keanggotaan', compact('anggota'));
    }

    public function editProfil(Request $request){
        $id_user = $request->session()->get('id_user');

        $anggota = anggota::where('id_user',$id_user)->first();
        return view('user.edit-keanggotaan', compact('anggota'));
    }

    public function prosesEditProfil(Request $request){
        $request->validate([
            'id_anggota' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
        ]);

        $anggota = anggota::find($request->id_anggota);

        $anggota->nama = $request->nama;
        $anggota->alamat = $request->alamat;
        $anggota->jkl = $request->jkl;
        $anggota->save();

        return redirect()->intended('/keanggotaan');
    }

    public function rating(Request $request){
        $id_user = $request->session()->get('id_user');
        $anggota = anggota::where('id_user', $id_user)->first();

        $dataPengembalian = pengembalian::leftjoin('peminjamen', 'pengembalians.id_peminjaman', 'peminjamen.id_peminjaman')
        ->leftjoin('ratings', 'pengembalians.id_pengembalian', 'ratings.id_pengembalian')
        ->leftjoin('bukus', 'peminjamen.id_buku', 'bukus.id_buku')
        ->select('bukus.judul', 'bukus.id_buku', 'pengembalians.id_pengembalian', 'pengembalians.tanggal_pengembalian', 'ratings.rating', 'ratings.ulasan', 'ratings.tanggal_dibuat')
        ->where('peminjamen.dikembalikan', 1)
        ->where('peminjamen.id_anggota', $anggota->id_anggota)->get();

        return view('user.buku.daftar-rating-buku', compact('dataPengembalian'));
    }

    public function beriRating($id_buku, $id_pengembalian, Request $request){
        $id_user = $request->session()->get('id_user');

        $anggota = anggota::where('id_user', $id_user)->first();
        $id_anggota = $anggota->id_anggota;

        $buku = buku::find($id_buku);
        return view('user.buku.beri-rating', compact('buku', 'id_pengembalian'));
    }

    public function prosesBeriRating(Request $request){
        $request->validate([
            'id_pengembalian' => 'required',
            'rating' => 'required',
            'ulasan' => 'required'
        ]);

        rating::create($request->all());

        return redirect()->intended('/buku/rating');
    }
}