<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

     public function handle(Request $request, Closure $next)
     {
         if (Auth::check() && in_array(Auth::user()->isAdmin, ['admin'])) {
             return $next($request);
         }
         return abort(404);
     }
     

    //  public function handle(Request $request, Closure $next)
    //  {
    //      // Pastikan pengguna sudah terautentikasi dan cek apakah mereka admin
    //      if (Auth::check() && Auth::user()->is_admin != 1) {
    //          // Redirect pengguna non-admin ke halaman yang diinginkan, misalnya dashboard pengguna
    //          return redirect()->route('dashboarduser');
    //      }
    //      return $next($request);
    //  }


    //  public function handle(Request $request, Closure $next): Response
    // {
    //     if (Auth::user()->isAdmin != 1) {
    //         return redirect('dashboard');
    //     }
    //     return $next($request);
    // }
    // public function handle(Request $request, Closure $next)
    // {
    //     if (Auth::user()->is_admin == 1) {
    // return $next($request);
    //     }
    //     return abort(403);
    // }   

    // public function handle(Request $request, Closure $next)
    // {
    //     if(auth()->check()){
    //         if(auth()->user()->is_admin != 1){
    //             return $next($request);
    //         }
    //         else {
    //             return to_route('AssalaamPerpustakaan');
    //         }
    //     }
    // }
}
