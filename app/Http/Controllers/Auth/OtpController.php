<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Verifytoken;
use App\Models\User;
use Illuminate\Http\Request;

class OtpController extends Controller
{
    public function index()
    {
        // return view('auth.otp');
        $get_user = User::where('email', auth()->user()->email)->first();
        if ($get_user->is_activated == 1) {
            return view('auth.otp');
        } else {
            return redirect()->route('verifyAccount');

            // return redirect('verifyAccount');
        }
    }

    public function verifyaccount()
    {
        return view('auth.otp_verification');
    }

    public function useractivation(Request $request)
    {
        $get_token = $request->token;
        $get_token = Verifytoken::where('token', $get_token)->first();

        if ($get_token) {
            $get_token->is_activated = 1;
            $get_token->save();
            $user = User::where('email', $get_token->email)->first();
            $user->is_activated = 1;
            $user->save();
            $getting_token = Verifytoken::where('token', $get_token->token)->first();
            $getting_token->delete();
            return redirect()->route('dashboarduser')->with('activated', 'Akun Anda telah sukses diaktifkan');
        } else {
            return redirect()->route('verifyAccount')->with('incorrect', 'Nomer OTP Anda Salah, Tolong Cek Kembali email Anda');
        }
    }
}
