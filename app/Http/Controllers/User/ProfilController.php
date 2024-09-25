<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Middleware\IsAdmin;
use App\Models\User;
use App\Models\Peminjamens;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ProfilController extends Controller
{

    public function index()
    {
        $user = Auth::user();

        $jumlahpengajuanditerima = Peminjamens::where('status_pengajuan', 'pengajuan diterima')->where('nama_peminjam', $user->name)->where('notif', false)->count();
        $jumlahpengajuanditolak = Peminjamens::where('status_pengajuan', 'pengajuan ditolak')->where('nama_peminjam', $user->name)->where('notif', false)->count();
        $jumlahpengembalianditerima = Peminjamens::where('status_pengajuan', 'pengembalian diterima')->where('nama_peminjam', $user->name)->where('notif', false)->count();
        $jumlahpengembalianditolak = Peminjamens::where('status_pengajuan', 'pengembalian ditolak')->where('nama_peminjam', $user->name)->where('notif', false)->count();
        $peminjamannotif = Peminjamens::where('nama_peminjam', $user->name)->whereIn('status_pengajuan', ['pengajuan diterima', 'pengajuan ditolak', 'pengembalian diterima', 'pengembalian ditolak'])->orderBy('id', 'desc')->get();
        Peminjamens::where('notif', false)->update(['notif' => true]);

        return view('Role.user.profile', compact('user', 'peminjamannotif', 'jumlahpengajuanditerima', 'jumlahpengajuanditolak', 'jumlahpengembalianditerima', 'jumlahpengembalianditolak'));
    }


    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                // use Illuminate\Validation\Rule;
                Rule::unique('users')->ignore($user->id)
            ],
        ]);

        $user->name = $request->name;
        $user->alamat = $request->alamat;
        $user->no_hp = $request->no_hp;
        $user->email = $request->email;
        // $user->isAdmin = $request->isAdmin;

        //  delete img
        if ($request->hasFile('fotoprofile')) {
            $img = $request->file('fotoprofile');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('images/user', $name);
            $user->fotoprofile = $name;
        }


        $user->save();

        return redirect()->route('profile')->with('success', 'Profil berhasil diperbarui');
    }
}
