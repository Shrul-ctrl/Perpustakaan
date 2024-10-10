<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Ulasan;
use App\Models\Buku;
use App\Models\Peminjamens;

class UlasanController extends Controller
{
    // public function index()
    // {
    //     $user = Auth::user();
    //     $ulasan = Buku::all();
    //     return view('Role.user.ulasan', compact('user','ulasan'));
    // }
    public function create()
    {
        $user = Auth::user();
        $buku = Buku::all();
        $pinjam = Peminjamens::all();
        return view('Role.user.ulasan', compact('user', 'buku','pinjam'));
    }

    public function store(Request $request)
    {
        $penuli = new Ulasan();
        $penuli->id_peminjaman = $request->id_peminjaman;
        $penuli->id_user = $request->id_user;
        $penuli->rating = $request->rating;
        $penuli->ulasan = $request->ulasan;
        $penuli->save();

        return redirect()->route('historiuser')->with('success', 'Data berhasil ditambah');
    }
}
