<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Peminjamens;
use App\Models\Buku;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class PeminjamanController extends Controller
{
    public function index(Request $request)
    {   
        $user = Auth::user();
    
        $query = Peminjamens::where('nama_peminjam', $user->name)
            ->whereIn('status_pengajuan', ['menunggu pengajuan', 'pengajuan diterima', 'pengajuan ditolak', 'pengembalian diterima', 'pengembalian ditolak']);
    
        if ($request->filled('status_pengajuan')) {
            $query->where('status_pengajuan', $request->status_pengajuan);
        }
    
        $peminjaman = $query->orderBy('id', 'desc')->get();
        $peminjamanditerima = Peminjamens::where('status_pengajuan', 'pengajuan diterima')->orderBy('id', 'desc')->get();
    
        $jumlahpengajuanditerima = Peminjamens::where('status_pengajuan', 'pengajuan diterima')->where('nama_peminjam', $user->name)->where('notif', false)->count();
        $jumlahpengajuanditolak = Peminjamens::where('status_pengajuan', 'pengajuan ditolak')->where('nama_peminjam', $user->name)->where('notif', false)->count();
        $jumlahpengembalianditerima = Peminjamens::where('status_pengajuan', 'pengembalian diterima')->where('nama_peminjam', $user->name)->where('notif', false)->count();
        $jumlahpengembalianditolak = Peminjamens::where('status_pengajuan', 'pengembalian ditolak')->where('nama_peminjam', $user->name)->where('notif', false)->count();
        $peminjamannotif = Peminjamens::where('nama_peminjam', $user->name)->whereIn('status_pengajuan', ['pengajuan diterima', 'pengajuan ditolak', 'pengembalian diterima', 'pengembalian ditolak'])->orderBy('id', 'desc')->get();
        
        Peminjamens::where('notif', false)->update(['notif' => true]);
    
        return view('Role.user.peminjaman.index', compact('user', 'peminjamannotif', 'peminjaman', 'peminjamanditerima', 'jumlahpengajuanditerima', 'jumlahpengajuanditolak', 'jumlahpengembalianditerima', 'jumlahpengembalianditolak'));
    }
    
    public function create($id)
    {
        $buku = Buku::findOrFail($id);
        $batastanggal = Carbon::now()->addWeek()->format('Y-m-d');
        $sekarang = now()->format('Y-m-d');
        $user = Auth::user();
        return view('Role.user.peminjaman.create', compact('buku', 'batastanggal', 'sekarang', 'user'));
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
        $peminjaman->nama_peminjam = $request->nama_peminjam;
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
        $jumlahpengajuanditerima = Peminjamens::where('status_pengajuan', 'pengajuan diterima')->where('nama_peminjam', $user->name)->count();
        $jumlahpengajuanditolak = Peminjamens::where('status_pengajuan', 'pengajuan ditolak')->where('nama_peminjam', $user->name)->count();
        $jumlahpengembalianditerima = Peminjamens::where('status_pengajuan', 'pengembalian diterima')->where('nama_peminjam', $user->name)->count();
        $jumlahpengembalianditolak = Peminjamens::where('status_pengajuan', 'pengembalian ditolak')->where('nama_peminjam', $user->name)->count();
        return view('Role.user.peminjaman.showpengajuan', compact('user', 'buku', 'peminjaman', 'peminjamannotif', 'jumlahpengajuanditerima', 'jumlahpengajuanditolak', 'jumlahpengembalianditerima', 'jumlahpengembalianditolak'));
    }

    public function showpengembalianuser($id)
    {
        $peminjaman = Peminjamens::findOrFail($id);
        $peminjamannotif = Peminjamens::all();
        $buku = Buku::all();
        $user = Auth::user();
        $jumlahpengajuanditerima = Peminjamens::where('status_pengajuan', 'pengajuan diterima')->where('nama_peminjam', $user->name)->count();
        $jumlahpengajuanditolak = Peminjamens::where('status_pengajuan', 'pengajuan ditolak')->where('nama_peminjam', $user->name)->count();
        $jumlahpengembalianditerima = Peminjamens::where('status_pengajuan', 'pengembalian diterima')->where('nama_peminjam', $user->name)->count();
        $jumlahpengembalianditolak = Peminjamens::where('status_pengajuan', 'pengembalian ditolak')->where('nama_peminjam', $user->name)->count();
        return view('Role.user.peminjaman.showpengembalian', compact('user', 'buku', 'peminjaman', 'peminjamannotif', 'jumlahpengajuanditerima', 'jumlahpengajuanditolak', 'jumlahpengembalianditerima', 'jumlahpengembalianditolak'));
    }



    public function edit(Peminjamens $peminjaman)
    {
        $peminjamannotif = Peminjamens::all();
        $buku = Buku::all();
        $user = Auth::user();
        $jumlahpengajuanditerima = Peminjamens::where('status_pengajuan', 'pengajuan diterima')->where('nama_peminjam', $user->name)->count();
        $jumlahpengajuanditolak = Peminjamens::where('status_pengajuan', 'pengajuan ditolak')->where('nama_peminjam', $user->name)->count();
        $jumlahpengembalianditerima = Peminjamens::where('status_pengajuan', 'pengembalian diterima')->where('nama_peminjam', $user->name)->count();
        $jumlahpengembalianditolak = Peminjamens::where('status_pengajuan', 'pengembalian ditolak')->where('nama_peminjam', $user->name)->count();
        return view('Role.user.peminjaman.edit', compact('user', 'buku', 'peminjaman', 'peminjamannotif', 'jumlahpengajuanditerima', 'jumlahpengajuanditolak', 'jumlahpengembalianditerima', 'jumlahpengembalianditolak'));
    }

}