<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Peminjamens;
use App\Models\Buku;

class UlasanController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $jumlahpengajuanditerima = Peminjamens::where('status_pengajuan', 'pengajuan diterima')->where('nama_peminjam', $user->name)->where('notif', false)->count();
        $jumlahpengajuanditolak = Peminjamens::where('status_pengajuan', 'pengajuan ditolak')->where('nama_peminjam', $user->name)->where('notif', false)->count();
        $jumlahpengembalianditerima = Peminjamens::where('status_pengajuan', 'pengembalian diterima')->where('nama_peminjam', $user->name)->where('notif', false)->count();
        $jumlahpengembalianditolak = Peminjamens::where('status_pengajuan', 'pengembalian ditolak')->where('nama_peminjam', $user->name)->where('notif', false)->count();
        $peminjamannotif = Peminjamens::where('nama_peminjam', $user->name)->whereIn('status_pengajuan', ['pengajuan diterima', 'pengajuan ditolak', 'pengembalian diterima', 'pengembalian ditolak'])->orderBy('id', 'desc')->get();
        Peminjamens::where('notif', false)->update(['notif' => true]);

        return view('Role.user.ulasan', compact('peminjamannotif','user', 'jumlahpengajuanditerima', 'jumlahpengajuanditolak', 'jumlahpengembalianditerima', 'jumlahpengembalianditolak'));
    }
}
