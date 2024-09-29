<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Peminjamens;
use App\Models\Buku;

class UlasanController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('Role.user.ulasan', compact('user'));
    }
}
