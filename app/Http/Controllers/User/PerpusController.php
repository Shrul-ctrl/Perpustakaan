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
use Illuminate\Http\Request;
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

    public function listbuku(Request $request, $id = null)
    {
        $user = Auth::user();
        $bukupopuler = Buku::orderBy('id', 'desc')->get();
        $kategori = Kategori::all();
        $penerbit = Penerbit::all();
        $penulis = penuli::all();
        $peminjaman = Peminjamens::all();

        $query = Buku::query();

        if ($request->filter === 'terbaru') {
            $query->orderBy('id', 'desc');
        }
        $query->orderBy('id', 'desc');
        $buku = $query->paginate(16);
        return view('Role.user.listbuku', compact('bukupopuler', 'user', 'penerbit', 'penulis', 'peminjaman', 'buku', 'kategori'));
    }


    public function showbuku($id)
    {
        $buku = Buku::findOrFail($id);
        // $user = User::findOrFail($id);
        $user = Auth::user();
        $peminjaman = Peminjamens::all();
        $komentars = Komentar::with('user')->latest()->get();
        return view('Role.user.show', compact('komentars', 'buku', 'peminjaman', 'user'));
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

    public function profilelistbuku(Request $request, $id = null)
    {
        $user = Auth::user();
        $bukupopuler = Buku::orderBy('id', 'desc')->get();
        $kategori = Kategori::all();
        $penerbit = Penerbit::all();
        $penulis = penuli::all();
        $peminjaman = Peminjamens::all();

        $query = Buku::query();

        if ($request->filter === 'terbaru') {
            $query->orderBy('id', 'desc');
        }
        $query->orderBy('id', 'desc');
        $buku = $query->paginate(16);
        return view('Role.user.profilelistbuku', compact('bukupopuler', 'user', 'penerbit', 'penulis', 'peminjaman', 'buku', 'kategori'));
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
