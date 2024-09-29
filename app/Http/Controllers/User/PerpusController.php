<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Peminjamens;
use App\Models\penuli;
use App\Models\Kategori;
use App\Models\buku;
use App\Models\penerbit;
use App\Models\user;
use App\Models\komentar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;



class PerpusController extends Controller
{
    public function index()
    {

        $buku = Buku::all();
        $user = Auth::user();
        $peminjaman = Peminjamens::all();
        return view('Role.user.home',  compact('user', 'peminjaman', 'buku'));
    }

    public function fax()
    {
        $user = Auth::user();
        return view('Role.user.fax',  compact('user'));
    }

    public function hubungi()
    {
        $user = Auth::user();
        return view('Role.user.hubungi',  compact('user'));
    }

    public function dashboard()
    {
        $user = Auth::User();
        $jumlahbuku = Buku::count();
        $jumlahpenerbit = Penerbit::count();
        $jumlahpenulis = Penuli::count();
        $jumlahkategori = Kategori::count();
        $jumlahpinjam = Peminjamens::where('id_user', $user->id)->count();
        $jumlahhistori = Peminjamens::where('id_user', $user->id)->where('status_pengajuan', 'pengembalian diterima')->count();

        $buku = Buku::orderBy('id', 'desc')->get();
        $peminjamanuser = Peminjamens::where('id_user', $user->id)->get();
        return view('Role.user.dashboarduser', compact('peminjamanuser', 'user', 'buku', 'jumlahbuku', 'jumlahpenerbit', 'jumlahpenulis', 'jumlahkategori', 'jumlahpinjam', 'jumlahhistori', 'user'));
    }

    public function listbuku($id = null)
    {
        $kategori = Kategori::all();
        $penerbit = penerbit::all();
        $penulis = penuli::all();
        $bukufilter = buku::all();
        $buku = $id ? Buku::where('id_kategori', $id)->get() :
            $buku = Buku::paginate(16);
        $kategoriDipilih = $id ? Kategori::find($id) : null;
        $pagination = Buku::paginate(16);
        $user = Auth::user();
        $peminjaman = Peminjamens::all();
        return view('Role.user.listbuku',  compact('kategoriDipilih', 'pagination', 'user','bukufilter','penerbit','penulis', 'peminjaman', 'buku', 'kategori'));
    }

    public function show($id)
    {
        $buku = Buku::findOrFail($id);
        $user = User::findOrFail($id);
        $user = Auth::user();
        $peminjaman = Peminjamens::all();
        $komentars = Komentar::with('user')->latest()->get();
        return view('Role.user.show', ['user' => $user], compact('komentars', 'buku', 'peminjaman', 'user'));
    }

    // public function historishow($id)
    // {
    //     $buku = Buku::findOrFail($id);
    //     $user = User::findOrFail($id);
    //     $user = Auth::user();
    //     $peminjaman = Peminjamens::all();
    //     $komentars = Komentar::with('user')->latest()->get();
    //     return view('Role.user.historiuser', ['user' => $user], compact('komentars', 'buku', 'peminjaman', 'user'));
    // }

    public function profilelistbuku($id = null)
    {
        $user = Auth::user();
        $kategori = Kategori::all();
        $buku = $id ? Buku::where('id_kategori', $id)->get() :
            $buku = Buku::paginate(8);
        $kategoriDipilih = $id ? Kategori::find($id) : null;
        $pagination = Buku::paginate(8);
        return view('Role.user.profilelistbuku', compact('kategoriDipilih', 'pagination', 'user', 'buku', 'kategori'));
    }

    public function riwayat()
    {
        $user = Auth::user();
        $buku = Buku::all();
        $peminjaman = Peminjamens::where('status_pengajuan', 'pengembalian diterima')->where('id_user', $user->id)->paginate(8);
        $pagination = DB::table('peminjamens')->paginate(8);

        return view('Role.user.historiuser', compact('buku', 'pagination', 'user', 'peminjaman'));
    }
}
