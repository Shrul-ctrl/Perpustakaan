<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\KirimEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\Peminjamens;
use App\Models\Buku;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class PeminjamanAdminrController extends Controller
{
    public function indexpengajuan()
    {
        $peminjaman = Peminjamens::where('status_pengajuan', 'menunggu pengajuan')->orderBy('id', 'desc')->get();
        $jumlahpengembalian = Peminjamens::where('status_pengajuan', 'dikembalikan')->where('notif', false)->count();
        $jumlahpengajuan = Peminjamens::where('status_pengajuan', 'menunggu pengajuan')->where('notif', false)->count();
        $peminjamannotif = Peminjamens::orderBy('id', 'desc')->get();
        $user = Auth::user();
        return view('Role.admin.peminjaman.indexpengajuan', ['user' => $user], compact('peminjamannotif', 'peminjaman', 'jumlahpengajuan', 'jumlahpengembalian'));
    }

    public function indexpeminjaman()
    {
        $peminjaman = Peminjamens::orderBy('id', 'desc')->get();
        $jumlahpengembalian = Peminjamens::where('status_pengajuan', 'dikembalikan')->where('notif', false)->count();
        $jumlahpengajuan = Peminjamens::where('status_pengajuan', 'menunggu pengajuan')->where('notif', false)->count();
        $peminjamannotif = Peminjamens::all();
        $user = Auth::user();
        return view('Role.admin.peminjaman.indexpeminjaman', ['user' => $user], compact('peminjamannotif', 'peminjaman', 'jumlahpengajuan', 'jumlahpengembalian'));
    }

    public function indexpengembalian()
    {
        $peminjaman = Peminjamens::where('status_pengajuan', 'dikembalikan')->orderBy('id', 'desc')->get();
        $jumlahpengembalian = Peminjamens::where('status_pengajuan', 'dikembalikan')->where('notif', false)->count();
        $jumlahpengajuan = Peminjamens::where('status_pengajuan', 'menunggu pengajuan')->where('notif', false)->count();
        $peminjamannotif = Peminjamens::all();
        $user = Auth::user();
        return view('Role.admin.peminjaman.indexpengembalian', compact('user', 'peminjamannotif', 'peminjamannotif', 'peminjaman', 'jumlahpengajuan', 'jumlahpengembalian'));
    }

    public function showpengajuan($id)
    {
        $peminjaman = Peminjamens::findOrFail($id);
        $jumlahpengembalian = Peminjamens::where('status_pengajuan', 'dikembalikan')->where('notif', false)->count();
        $jumlahpengajuan = Peminjamens::where('status_pengajuan', 'menunggu pengajuan')->where('notif', false)->count();
        $peminjamannotif = Peminjamens::all();
        $user = Auth::user();
        return view('Role.admin.peminjaman.showpengajuan', ['user' => $user], compact('peminjamannotif', 'peminjaman', 'jumlahpengajuan', 'jumlahpengembalian'));
    }

    public function showpengembalian($id)
    {
        $peminjaman = Peminjamens::findOrFail($id);
        $jumlahpengembalian = Peminjamens::where('status_pengajuan', 'dikembalikan')->where('notif', false)->count();
        $jumlahpengajuan = Peminjamens::where('status_pengajuan', 'menunggu pengajuan')->where('notif', false)->count();
        $peminjamannotif = Peminjamens::all();
        $user = Auth::user();
        return view('Role.admin.peminjaman.showpengembalian', ['user' => $user], compact('peminjamannotif', 'peminjaman', 'jumlahpengajuan', 'jumlahpengembalian'));
    }

    public function update(Request $request, Peminjamens $peminjaman)
    {

        $peminjaman->status_pengajuan = $request->status_pengajuan;
        $peminjaman->alasan_pengembalian = $request->alasan_pengembalian;
        $peminjaman->alasan_pengajuan = $request->alasan_pengajuan;

        if ($request->status_pengajuan === 'pengajuan diterima') {
            $buku = Buku::findOrFail($peminjaman->id_buku);
            if ($buku) {
                $buku->jumlah_buku -= $peminjaman->jumlah_pinjam;
                $buku->save();
            }
            $peminjaman->notif = false;
            $peminjaman->status_pengajuan = 'pengajuan diterima';
            // Mail::to($peminjaman->user->email)->send(new KirimEmail($peminjaman, 'pengajuan diterima'));
            // Mail::to($request->user())->send(new KirimEmail($peminjaman));


        } elseif ($request->status_pengajuan === 'pengajuan ditolak') {
            $peminjaman->notif = false;
            $peminjaman->status_pengajuan = 'pengajuan ditolak';
            // Mail::to($peminjaman->user->email)->send(new KirimEmail($peminjaman, 'pengajuan ditolak'));
        } elseif ($request->status_pengajuan === 'dikembalikan') {

            $buku = Buku::findOrFail($peminjaman->id_buku);
            if ($buku) {
                $buku->jumlah_buku += $peminjaman->jumlah_pinjam;
                $buku->save();
            }
            $peminjaman->status_pengajuan = 'dikembalikan';
        } elseif ($request->status_pengajuan === 'pengembalian diterima') {

            $buku = Buku::findOrFail($peminjaman->id_buku);
            if ($buku) {
                $buku->jumlah_buku += $peminjaman->jumlah_pinjam;
                $buku->save();
            }
            $peminjaman->notif = false;
            $peminjaman->status_pengajuan = 'pengembalian diterima';
            // Mail::to($peminjaman->user->email)->send(new KirimEmail($peminjaman));
        } elseif ($request->status_pengajuan === 'pengembalian ditolak') {
            $buku = Buku::findOrFail($peminjaman->id_buku);
            if ($buku) {
                $buku->jumlah_buku += $peminjaman->jumlah_pinjam;
                $buku->save();
            }
            $peminjaman->notif = false;
            $peminjaman->status_pengajuan = 'pengembalian ditolak';
            // Mail::to($peminjaman->user->email)->send(new KirimEmail($peminjaman, 'pengembalian ditolak'));
        } elseif ($request->status_pengajuan === 'sukses') {
            $buku = Buku::findOrFail($peminjaman->id_buku);
            if ($buku) {
                $buku->jumlah_buku += $peminjaman->jumlah_pinjam;
                $buku->save();
            }
            $peminjaman->status_pengajuan = 'sukses';
        }

        $peminjaman->save();

        return redirect()->route('indexpengajuan')->with('success', 'Status pengajuan berhasil diperbarui');
        // if ($request->has('redirect_to') && $request->redirect_to === 'staff.showpengajuan') {
        //     return redirect()->route('staff.indexpengajuan')->with('success', 'Status pengajuan berhasil diperbarui');
        // } elseif ($request->has('redirect_to') && $request->redirect_to === 'showpengembalian') {
        //     return redirect()->route('indexpengembalian')->with('success', 'Pinjaman Buku berhasil dikembalikan');
        // } else {
        //     return redirect()->route('Role.admin.peminjaman.index')->with('success', 'Peminjaman Buku berhasil dikembalikan');
        // }
    }
}
