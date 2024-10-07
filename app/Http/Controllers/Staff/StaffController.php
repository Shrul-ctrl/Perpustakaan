<?php

namespace App\Http\Controllers\Staff;;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\penuli;
use App\Models\Kategori;
use App\Models\buku;
use App\Models\penerbit;
use App\Models\user;
use App\Models\Peminjamens;
use App\Models\Komentar;
use Illuminate\Support\Facades\Auth;

class StaffController extends Controller
{
    public function index()
    {

        $jumlahpengembalian = Peminjamens::where('status_pengajuan', 'dikembalikan')->where('notif', false)->count();
        $jumlahpengajuan = Peminjamens::where('status_pengajuan', 'menunggu pengajuan')->where('notif', false)->count();
        $peminjamannotif = Peminjamens::all();
        Peminjamens::where('notif', false)->update(['notif' => true]);
        // $peminjamannotif = Peminjamens::where('notif', false)->get();
        $jumlahuser  = User::whereIn('isAdmin', ['staff', 'user'])->count();
        $jumlahpeminjamanbuku  = Peminjamens::count();
        $users = User::orderBy('id', 'desc')->get();
        $jumlahkategori = Kategori::count();
        $jumlahpenerbit = Penerbit::count();
        $jumlahpenulis = Penuli::count();
        $jumlahbuku = Buku::count();
        $jumlahkomentar = Komentar::count();

        $user = Auth::user();

        $peminjamanaperbulan = Peminjamens::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total', 'month')->toArray();

        $dataPinjam = [];
        for ($i = 1; $i <= 12; $i++) {
            $dataPinjam[$i] = $peminjamanaperbulan[$i] ?? 0;
        }

        $user = Auth::user();

        return view('Role.staff.dashboard', ['dataPinjam' => array_values($dataPinjam),], compact('peminjamannotif', 'jumlahkomentar', 'users', 'user', 'jumlahuser', 'jumlahbuku', 'jumlahpenerbit', 'jumlahpenulis', 'jumlahkategori', 'jumlahpengajuan', 'jumlahpengembalian', 'jumlahpeminjamanbuku'));
    }
}
