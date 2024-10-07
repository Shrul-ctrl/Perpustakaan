<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Http\Middleware\IsAdmin;
use App\Models\User;
use App\Models\Peminjamens;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', IsAdmin::class]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jumlahpengembalian = Peminjamens::where('status_pengajuan','dikembalikan')->where('notif', false)->count(); 
        $jumlahpengajuan = Peminjamens::where('status_pengajuan','menunggu pengajuan')->where('notif', false)->count();
        $users = User::orderBy('id', 'desc')->get();
        $peminjamannotif = Peminjamens::all();
        $user = Auth::user();
        return view('Role.staff.user.index', compact('peminjamannotif','user','users','jumlahpengajuan','jumlahpengembalian'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jumlahpengembalian = Peminjamens::where('status_pengajuan','dikembalikan')->where('notif', false)->count(); 
        $jumlahpengajuan = Peminjamens::where('status_pengajuan','menunggu pengajuan')->where('notif', false)->count();
        $peminjamannotif = Peminjamens::all();
        $user = Auth::user();
        return view('Role.staff.user.create', compact('peminjamannotif','user','jumlahpengajuan','jumlahpengembalian'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'alamat' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ],
            [
                'email.required' => 'Email harus diisi',
                'email.unique' => 'Email dengan nama tersebut sudah ada sebelumnya.',
            ]
        );

        $user = new User();
        $user->name = $request->name;
        $user->alamat = $request->alamat;
        $user->no_hp = $request->no_hp;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->isAdmin = $request->isAdmin;

          // update img
          if ($request->hasFile('fotoprofile')) {
            $img = $request->file('fotoprofile');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('images/user', $name);
            $user->fotoprofile = $name;
        }

        $user->save();

        return redirect()->route('staff.user.index')->with('success', 'berhasil didaftarkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $user = Auth::user();
        $jumlahpengembalian = Peminjamens::where('status_pengajuan','dikembalikan')->where('notif', false)->count(); 
        $jumlahpengajuan = Peminjamens::where('status_pengajuan','menunggu pengajuan')->where('notif', false)->count();
        $peminjamannotif = Peminjamens::all();
        return view('Role.staff.user.show', compact('peminjamannotif','user','jumlahpengajuan','jumlahpengembalian'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $user = Auth::user();
        $jumlahpengembalian = Peminjamens::where('status_pengajuan','dikembalikan')->where('notif', false)->count(); 
        $jumlahpengajuan = Peminjamens::where('status_pengajuan','menunggu pengajuan')->where('notif', false)->count();
        $peminjamannotif = Peminjamens::all();
        return view('Role.staff.user.edit', compact('peminjamannotif','user','jumlahpengajuan','jumlahpengembalian'));
    }

    /**
     * Update the specified resource in storage.
     */
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
        if ($request->has('redirect_to') && $request->redirect_to === 'profile') {
            return redirect()->route('profile')->with('success', 'Profil berhasil diperbarui');
        } else {
            return redirect()->route('staff.user.index')->with('success', 'Data berhasil diperbarui');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if (Auth::user()->id != $user->id) {
            $user->delete();
            return redirect()->route('staff.user.index');
        }
        return redirect()->route('staff.user.index')->with('success', 'Data berhasil dihapus');
    }
}
