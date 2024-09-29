<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Peminjamens;
use App\Models\Buku;
use Illuminate\Support\Facades\Auth;


class KategoriController extends Controller
{

    public function index()
    {

        $jumlahpengembalian = Peminjamens::where('status_pengajuan', 'dikembalikan')->where('notif', false)->count();
        $jumlahpengajuan = Peminjamens::where('status_pengajuan', 'menunggu pengajuan')->where('notif', false)->count();
        $kategori = Kategori::orderBy('id', 'desc')->get();
        $peminjamannotif = Peminjamens::all();
        $user = Auth::user();
        return view('Role.admin.kategori.index', compact('peminjamannotif', 'user', 'kategori', 'jumlahpengajuan', 'jumlahpengembalian'));
    }

    public function create()
    {

        $jumlahpengembalian = Peminjamens::where('status_pengajuan', 'dikembalikan')->where('notif', false)->count();
        $jumlahpengajuan = Peminjamens::where('status_pengajuan', 'menunggu pengajuan')->where('notif', false)->count();
        $peminjamannotif = Peminjamens::all();
        $user = Auth::user();
        return view('Role.admin.kategori.create', compact('peminjamannotif', 'user', 'jumlahpengajuan', 'jumlahpengembalian'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'nama_kategori' => 'required|unique:kategoris,nama_kategori'
            ],

            [
                'nama_kategori.required' => 'Nama harus diisi',
                'nama_kategori.unique' => 'Kategori dengan nama tersebut sudah ada sebelumnya.',
            ]
        );

        $kategori = new Kategori();
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->save();

        return redirect()->route('kategori.index')->with('success', 'Data berhasil ditambah');
    }

    public function show(Kategori $kategori)
    {
        $user = Auth::user();
        return view('Role.admin.kategori.show', compact('peminjamannotif', 'user', 'kategori'));
    }

    public function edit(Kategori $kategori)
    {
        $jumlahpengajuan = Peminjamens::where('status_pengajuan', 'menunggu pengajuan')->count();
        $jumlahpengembalian = Peminjamens::where('status_pengajuan', 'dikembalikan')->count();
        $peminjamannotif = Peminjamens::all();
        $user = Auth::user();
        return view('Role.admin.kategori.edit', compact('peminjamannotif', 'user', 'kategori', 'jumlahpengajuan', 'jumlahpengembalian'));
    }

    public function update(Request $request, Kategori $kategori)
    {

        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->save();
        return redirect()->route('kategori.index')->with('success', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
    
        // Check if there are any books associated with this category that are borrowed
        $bukudipinjam = Buku::where('id_kategori', $id)
            ->whereHas('peminjamens', function($query) {
                $query->whereIn('status_pengajuan', ['menunggu pengajuan', 'pengajuan diterima','pengembalian diterima', 'pengembalian ditolak','dikembalikan']);
            })
            ->exists();
    
        if ($bukudipinjam) {
            return redirect()->route('kategori.index')->with('error', 'Kategori tidak bisa dihapus karena masih ada buku yang terkait.');
        }
    
        $kategori->delete();
        return redirect()->route('kategori.index')->with('success', 'Data berhasil dihapus');
    }
    
}
