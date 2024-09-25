<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\komentar;
use Illuminate\Support\Facades\Auth;


class KomentarController extends Controller
{ 

    // public function create()
    // { 
    //     $komentar = Komentar::all(); 
    //     $user = Auth::user();
    //     return view('user.show', compact('komentar', 'user',));
    // }

    // public function store(Request $request) { 
    
    //     $komentar = new Komentar();
    //     $komentar->komentar = $request->komentar;
    //     $komentar->id_user = auth()->id();
    //     $komentar->tanggal_komentar = now();
    //     $komentar->save();

    
    //     return redirect()->back()->with('success', 'Komentar Berhasil diposting');
    // }
    
  
    
}
