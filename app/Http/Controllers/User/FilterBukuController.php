<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Peminjamens;
use App\Models\Penuli;
use App\Models\Kategori;
use App\Models\Buku;
use App\Models\Penerbit;
use Illuminate\Support\Facades\Auth;

class FilterBukuController extends Controller
{
    //home sebelim login
    public function filterkategori($id = null)
    {
        $bukupopuler = Buku::orderBy('id', 'desc')->get();
        $kategori = Kategori::all();
        $penerbit = Penerbit::all();
        $penulis = Penuli::all();
        $user = Auth::user();
        $peminjaman = Peminjamens::all();

        $buku = $id ? Buku::where('id_kategori', $id)->paginate(16) : Buku::paginate(16);
        return view('Role.user.listbuku', compact('bukupopuler','penerbit', 'penulis', 'user', 'peminjaman', 'buku', 'kategori'));
    }

    public function filterpenerbit($id = null)
    {
        $bukupopuler = Buku::orderBy('id', 'desc')->get();
        $kategori = Kategori::all();
        $penerbit = Penerbit::all();
        $penulis = Penuli::all();
        $user = Auth::user();
        $peminjaman = Peminjamens::all();

        $buku = $id ? Buku::where('id_penerbit', $id)->paginate(16) : Buku::paginate(16);
        return view('Role.user.listbuku', compact('bukupopuler','kategori', 'penerbit', 'penulis', 'user', 'peminjaman', 'buku'));
    }

    public function filterpenulis($id = null)
    {
        $bukupopuler = Buku::orderBy('id', 'desc')->get();
        $kategori = Kategori::all();
        $penerbit = Penerbit::all();
        $penulis = Penuli::all();
        $user = Auth::user();
        $peminjaman = Peminjamens::all();

        $buku = $id ? Buku::where('id_penulis', $id)->paginate(16) : Buku::paginate(16);
        return view('Role.user.listbuku', compact('bukupopuler','kategori', 'penerbit', 'penulis', 'user', 'peminjaman', 'buku'));
    }


    //user
    public function filterkategoriuser($id = null)
    {
        $bukupopuler = Buku::orderBy('id', 'desc')->get();
        $kategori = Kategori::all();
        $penerbit = Penerbit::all();
        $penulis = Penuli::all();
        $user = Auth::user();
        $peminjaman = Peminjamens::all();

        $buku = $id ? Buku::where('id_kategori', $id)->paginate(16) : Buku::paginate(16);
        return view('Role.user.profilelistbuku', compact('bukupopuler','penerbit', 'penulis', 'user', 'peminjaman', 'buku', 'kategori'));
    }

    public function filterpenerbituser($id = null)
    {
        $bukupopuler = Buku::orderBy('id', 'desc')->get();
        $kategori = Kategori::all();
        $penerbit = Penerbit::all();
        $penulis = Penuli::all();
        $user = Auth::user();
        $peminjaman = Peminjamens::all();

        $buku = $id ? Buku::where('id_penerbit', $id)->paginate(16) : Buku::paginate(16);
        return view('Role.user.profilelistbuku', compact('bukupopuler','kategori', 'penerbit', 'penulis', 'user', 'peminjaman', 'buku'));
    }

    public function filterpenulisuser($id = null)
    {
        $bukupopuler = Buku::orderBy('id', 'desc')->get();
        $kategori = Kategori::all();
        $penerbit = Penerbit::all();
        $penulis = Penuli::all();
        $user = Auth::user();
        $peminjaman = Peminjamens::all();

        $buku = $id ? Buku::where('id_penulis', $id)->paginate(16) : Buku::paginate(16);
        return view('Role.user.profilelistbuku', compact('bukupopuler','kategori', 'penerbit', 'penulis', 'user', 'peminjaman', 'buku'));
    }
}
