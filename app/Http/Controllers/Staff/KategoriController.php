<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Peminjamens;
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
        return view('Role.staff.kategori.index', compact('peminjamannotif', 'user', 'kategori', 'jumlahpengajuan', 'jumlahpengembalian'));
    }

    public function create()
    {

        $jumlahpengembalian = Peminjamens::where('status_pengajuan', 'dikembalikan')->where('notif', false)->count();
        $jumlahpengajuan = Peminjamens::where('status_pengajuan', 'menunggu pengajuan')->where('notif', false)->count();
        $peminjamannotif = Peminjamens::all();
        $user = Auth::user();
        return view('Role.staff.kategori.create', compact('peminjamannotif', 'user', 'jumlahpengajuan', 'jumlahpengembalian'));
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

        return redirect()->route('staff.kategori.index')->with('success', 'Data berhasil ditambah');
    }

    public function show(Kategori $kategori)
    {
        $user = Auth::user();
        return view('Role.staff.kategori.show', compact('peminjamannotif', 'user', 'kategori'));
    }

    public function edit(Kategori $kategori)
    {
        $jumlahpengajuan = Peminjamens::where('status_pengajuan', 'menunggu pengajuan')->count();
        $jumlahpengembalian = Peminjamens::where('status_pengajuan', 'dikembalikan')->count();
        $peminjamannotif = Peminjamens::all();
        $user = Auth::user();
        return view('Role.staff.kategori.edit', compact('peminjamannotif', 'user', 'kategori', 'jumlahpengajuan', 'jumlahpengembalian'));
    }

    public function update(Request $request, Kategori $kategori)
    {

        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->save();
        return redirect()->route('staff.kategori.index')->with('success', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $kategori = Kategori::FindOrFail($id);
        $kategori->delete();
        return redirect()->route('staff.kategori.index')->with('success', 'Data berhasil dihapus');
    }
}
