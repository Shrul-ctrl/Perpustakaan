<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Penerbit;
use App\Models\Peminjamens;
use Illuminate\Support\Facades\Auth;


class PenerbitController extends Controller
{

    public function index()
    {
        $penerbit = Penerbit::orderBy('id', 'desc')->get();
        $jumlahpengembalian = Peminjamens::where('status_pengajuan', 'dikembalikan')->where('notif', false)->count();
        $jumlahpengajuan = Peminjamens::where('status_pengajuan', 'menunggu pengajuan')->where('notif', false)->count();
        $peminjamannotif = Peminjamens::all();
        $user = Auth::user();
        return view('Role.admin.penerbit.index', compact('peminjamannotif', 'user', 'penerbit', 'jumlahpengajuan', 'jumlahpengembalian'));
    }

    public function create()
    {
        $user = Auth::user();
        $jumlahpengembalian = Peminjamens::where('status_pengajuan', 'dikembalikan')->where('notif', false)->count();
        $jumlahpengajuan = Peminjamens::where('status_pengajuan', 'menunggu pengajuan')->where('notif', false)->count();
        $peminjamannotif = Peminjamens::all();
        return view('Role.admin.penerbit.create', compact('peminjamannotif', 'user', 'jumlahpengajuan', 'jumlahpengembalian'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'nama_Penerbit' => 'required|unique:Penerbits,nama_Penerbit'
            ],

            [
                'nama_Penerbit.required' => 'Nama harus diisi',
                'nama_Penerbit.unique' => 'Penerbit dengan nama tersebut sudah ada sebelumnya.',
            ]
        );

        $Penerbit = new Penerbit();
        $Penerbit->nama_Penerbit = $request->nama_Penerbit;
        $Penerbit->alamat = $request->alamat;
        $Penerbit->save();

        return redirect()->route('penerbit.index')->with('success', 'Data berhasil ditambah');
    }

    public function show(Penerbit $Penerbit)
    {
        $user = Auth::user();
        return view('Role.admin.penerbit.show', compact('user', 'penerbit'));
    }

    public function edit(Penerbit $penerbit)
    {
        $user = Auth::user();
        $peminjamannotif = Peminjamens::all();
        $jumlahpengembalian = Peminjamens::where('status_pengajuan', 'dikembalikan')->where('notif', false)->count();
        $jumlahpengajuan = Peminjamens::where('status_pengajuan', 'menunggu pengajuan')->where('notif', false)->count();
        return view('Role.admin.penerbit.edit', compact('peminjamannotif', 'user', 'penerbit', 'jumlahpengajuan', 'jumlahpengembalian'));
    }

    public function update(Request $request, Penerbit $penerbit)
    {

        $penerbit->nama_penerbit = $request->nama_penerbit;
        $penerbit->alamat = $request->alamat;
        $penerbit->save();
        return redirect()->route('penerbit.index')->with('success', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $penerbit = Penerbit::FindOrFail($id);
        $penerbit->delete();
        return redirect()->route('penerbit.index')->with('success', 'Data berhasil dihapus');
    }
}
