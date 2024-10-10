<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Koleksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KoleksiController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $koleksi = Koleksi::all();
        return view('Role.user.koleksi', compact('user', 'koleksi'));
    }

    public function store(Request $request)
    {
        $koleksi = new Koleksi();
        $koleksi->id_user = $request->id_user;
        $koleksi->id_buku = $request->id_buku;
        $koleksi->status_disukai = $request->status_disukai;
        $koleksi->save();

        return redirect()->back()->with('success', 'Data berhasil ditambah');
    }

    public function destroy($id)
    {
        $koleksi = Koleksi::FindOrFail($id);
        $koleksi->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}


    // public function disimpan(Request $request, Buku $buku)
    // {
    //     // Set 'disukai' to true if the button was pressed
    //     $buku->disukai = $request->has('disukai') && $request->disukai === 'true';

    //     $buku->save();

    //     return redirect()->back()->with('success', 'Buku Berhasil disimpan');
    // }

    // public function batalkan(Request $request, Buku $buku)
    // {
    //     // Set 'disukai' to true if the button was pressed
    //     $buku->disukai = $request->has('disukai') && $request->disukai === 'false';

    //     $buku->save();

    //     return redirect()->back()->with('success', 'Buku Berhasil disimpan');
    // }    