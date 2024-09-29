<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Peminjamens;
use App\Models\Buku;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PeminjamanUserController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        $query = Peminjamens::where('id_user', $user->id)
            ->whereIn('status_pengajuan', ['menunggu pengajuan', 'pengajuan diterima', 'pengajuan ditolak', 'pengembalian diterima', 'pengembalian ditolak','dikembalikan']);

        if ($request->filled('status_pengajuan')) {
            $query->where('status_pengajuan', $request->status_pengajuan);
        }

        $peminjaman = $query->orderBy('id', 'desc')->get();
        $peminjamanditerima = Peminjamens::where('status_pengajuan', 'pengajuan diterima')->orderBy('id', 'desc')->get();


        return view('Role.user.peminjaman.index', compact('user', 'peminjaman', 'peminjamanditerima',));
    }

    public function create($id)
    {
        $buku = Buku::findOrFail($id);
        $batastanggal = Carbon::now()->addWeek()->format('Y-m-d');
        $sekarang = now()->format('Y-m-d');
        $user = Auth::user();
        $peminjaman = Peminjamens::all();
        return view('Role.user.peminjaman.create', compact('buku', 'batastanggal', 'sekarang', 'user', 'peminjaman'));
    }


    public function store(Request $request)
    {

        $buku = Buku::find($request->id_buku);
        if (!$buku) {
            return redirect()->back()->withErrors(['id_buku' => 'Buku tidak ditemukan'])->withInput();
        }

        if ($buku->jumlah_buku < $request->jumlah_pinjam) {
            return redirect()->back()->withErrors(['jumlah_pinjam' => 'Stok buku terbatas'])->withInput();
        }

        $peminjaman = new Peminjamens();
        $peminjaman->id_user = $request->id_user;
        $peminjaman->id_buku = $request->id_buku;
        $peminjaman->jumlah_pinjam = $request->jumlah_pinjam;
        $peminjaman->tanggal_pinjam = $request->tanggal_pinjam;
        $peminjaman->batas_pinjam = $request->batas_pinjam;
        $peminjaman->tanggal_kembali = $request->tanggal_kembali;
        $peminjaman->status_pengajuan = 'menunggu pengajuan';
        $peminjaman->save();

        return redirect()->route('peminjaman.index')->with('success', 'Pengajuan peminjaman buku berhasil dibuat. Tunggu persetujuan dari staff.');
    }

    public function showpengajuanuser($id)
    {
        $peminjaman = Peminjamens::findOrFail($id);
        $peminjamannotif = Peminjamens::all();
        $buku = Buku::all();
        $user = Auth::user();

        return view('Role.user.peminjaman.showpengajuan', compact('user', 'buku', 'peminjaman'));
    }

    public function showpengembalianuser($id)
    {
        $peminjaman = Peminjamens::findOrFail($id);
        $peminjamannotif = Peminjamens::all();
        $buku = Buku::all();
        $user = Auth::user();

        return view('Role.user.peminjaman.showpengembalian', compact('user', 'buku', 'peminjaman'));
    }



    public function edit(Peminjamens $peminjaman)
    {
        $peminjamannotif = Peminjamens::all();
        $buku = Buku::all();
        $user = Auth::user();
        return view('Role.user.peminjaman.edit', compact('user', 'buku', 'peminjaman'));
    }

    public function update(Request $request, Peminjamens $peminjaman)
    {

        $peminjaman->status_pengajuan = $request->status_pengajuan;

        if ($request->status_pengajuan === 'dikembalikan') {

            $buku = Buku::findOrFail($peminjaman->id_buku);
            if ($buku) {
                $buku->jumlah_buku += $peminjaman->jumlah_pinjam;
                $buku->save();
            }
            $peminjaman->status_pengajuan = 'dikembalikan';
        }

        $peminjaman->save();

        return redirect()->route('peminjaman.index')->with('success', 'Status pengajuan berhasil diperbarui');
    }
}
