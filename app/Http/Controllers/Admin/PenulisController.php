<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Penuli;
use App\Models\Peminjamens;
use App\Models\Buku;
use Illuminate\Support\Facades\Auth;


class PenulisController extends Controller
{
    public function index()
    {
        $penulis = Penuli::orderBy('id', 'desc')->get();
        $jumlahpengembalian = Peminjamens::where('status_pengajuan', 'dikembalikan')->where('notif', false)->count();
        $jumlahpengajuan = Peminjamens::where('status_pengajuan', 'menunggu pengajuan')->where('notif', false)->count();
        $peminjamannotif = Peminjamens::all();
        $user = Auth::user();
        return view('Role.admin.penulis.index', compact('user', 'peminjamannotif', 'penulis', 'jumlahpengajuan', 'jumlahpengembalian'));
    }

    public function create()
    {
        $jumlahpengembalian = Peminjamens::where('status_pengajuan', 'dikembalikan')->where('notif', false)->count();
        $jumlahpengajuan = Peminjamens::where('status_pengajuan', 'menunggu pengajuan')->where('notif', false)->count();
        $peminjamannotif = Peminjamens::all();
        $user = Auth::user();
        return view('Role.admin.penulis.create', compact('peminjamannotif', 'user', 'jumlahpengajuan', 'jumlahpengembalian'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'nama_penulis' => 'required|unique:penulis,nama_penulis'
            ],

            [
                'nama_penulis.required' => 'Nama harus diisi',
                'nama_penulis.unique' => 'Penuli dengan nama tersebut sudah ada sebelumnya.',
            ]
        );

        $penuli = new Penuli();
        $penuli->nama_penulis = $request->nama_penulis;
        $penuli->save();

        return redirect()->route('penulis.index')->with('success', 'Data berhasil ditambah');
    }

    public function show(Penuli $penuli)
    {
        $user = Auth::user();
        return view('Role.admin.penulis.show', ['user' => $user], compact('penuli'));
    }

    public function edit(Penuli $penuli)
    {
        $user = Auth::user();
        $peminjamannotif = Peminjamens::all();
        $jumlahpengembalian = Peminjamens::where('status_pengajuan', 'dikembalikan')->where('notif', false)->count();
        $jumlahpengajuan = Peminjamens::where('status_pengajuan', 'menunggu pengajuan')->where('notif', false)->count();
        return view('Role.admin.penulis.edit', compact('peminjamannotif', 'user', 'penuli', 'jumlahpengajuan', 'jumlahpengembalian'));
    }

    public function update(Request $request, Penuli $penuli)
    {

        $penuli->nama_penulis = $request->nama_penulis;
        $penuli->save();
        return redirect()->route('penulis.index')->with('success', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $penuli = Penuli::FindOrFail($id);


        $bukudipinjam = Buku::where('id_penulis', $id)
            ->whereHas('peminjamens', function ($query) {
                $query->whereIn('status_pengajuan', ['menunggu pengajuan', 'pengajuan diterima', 'pengembalian diterima', 'pengembalian ditolak', 'dikembalikan']);
            })
            ->exists();

        if ($bukudipinjam) {
            return redirect()->route('penulis.index')->with('error', 'Penulis tidak bisa dihapus karena masih ada buku yang terkait.');
        }

        $penuli->delete();
        return redirect()->route('penulis.index')->with('success', 'Data berhasil dihapus');
    }
}
