<?php

use Illuminate\Support\Facades\Route;

use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsStaff;



Route::get('', [App\Http\Controllers\User\PerpusController::class, 'index'])->name(name: 'AssalaamPerpustakaan');

Route::group(['prefix' => 'user'], function () {
    Route::get('show/{id}', [App\Http\Controllers\User\PerpusController::class, 'show']);
    Route::get('listbuku', [App\Http\Controllers\User\PerpusController::class, 'listbuku'])->name('listbuku');
    
    Route::group(['middleware' => ['auth']], function () {  
        Route::get('', [App\Http\Controllers\User\PerpusController::class, 'dashboard'])->name('dashboarduser');
        Route::get('kategori/{id}', [App\Http\Controllers\User\PerpusController::class, 'listbuku'])->name('buku.filter');
        Route::get('profile', [App\Http\Controllers\User\ProfilController::class, 'index'])->name('profile');
        Route::patch('profile/{user}', [App\Http\Controllers\User\ProfilController::class, 'update'])->name('profile.update');
        Route::get('profilelistbuku', [App\Http\Controllers\User\PerpusController::class, 'profilelistbuku'])->name('profilelistbuku');
        Route::get('profilelistbuku/{id}', [App\Http\Controllers\User\PerpusController::class, 'profilelistbuku'])->name('profilelistbuku.filter');
        Route::get('historiuser', [App\Http\Controllers\User\PerpusController::class, 'historiuser'])->name('historiuser');
        Route::resource('peminjaman', App\Http\Controllers\User\PeminjamanController::class);
        Route::get('peminjaman/create/{id}', [App\Http\Controllers\User\PeminjamanController::class, 'create'])->name('peminjaman.create');
        Route::get('pengajuan/show/{id}', [App\Http\Controllers\User\PeminjamanController::class, 'showpengajuanuser'])->name('showpengajuanuser');
        Route::get('pengembalian/show/{id}', [App\Http\Controllers\User\PeminjamanController::class, 'showpengembalianuser'])->name('showpengembalianuser');


        Route::resource('komentar', App\Http\Controllers\User\KomentarController::class);
        Route::resource('kontak', App\Http\Controllers\User\KontakController::class);
        Route::get('ulasan', [App\Http\Controllers\User\UlasanController::class, 'index'])->name('ulasan');

    });

});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', IsAdmin::class]], function () {
    Route::get('', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('kategori', App\Http\Controllers\Admin\KategoriController::class);
    Route::resource('penerbit', App\Http\Controllers\Admin\PenerbitController::class);
    Route::resource('penulis', App\Http\Controllers\Admin\PenulisController::class);
    Route::resource('buku', App\Http\Controllers\Admin\BukuController::class);
    Route::resource('user', App\Http\Controllers\Admin\UserController::class);

    // peminjaman
    Route::resource('peminjaman', App\Http\Controllers\Admin\PeminjamanController::class);
    Route::get('pengajuan/show/{id}', [App\Http\Controllers\Admin\PeminjamanController::class, 'showpengajuan'])->name('showpengajuan');
    Route::get('pengembalian/show/{id}', [App\Http\Controllers\Admin\PeminjamanController::class, 'showpengembalian'])->name('showpengembalian');
    Route::get('pengajuan', [App\Http\Controllers\Admin\PeminjamanController::class, 'indexpengajuan'])->name('indexpengajuan');
    Route::get('peminjaman', [App\Http\Controllers\Admin\PeminjamanController::class, 'indexpeminjaman'])->name('indexpeminjaman');
    Route::get('pengembalian', [App\Http\Controllers\Admin\PeminjamanController::class, 'indexpengembalian'])->name('indexpengembalian');
    // end peminjaman


    // Route::post('import', [BukuController::class, 'import'])->name('user.import');
});

Route::group(['prefix' => 'staff', 'middleware' => ['auth', isStaff::class]], function () {
    Route::get('', [App\Http\Controllers\Staff\StaffController::class, 'index'])->name('staffhome');
    Route::resource('kategori', App\Http\Controllers\Staff\KategoriController::class, ['as' => 'staff']);
    Route::resource('penerbit', App\Http\Controllers\Staff\PenerbitController::class, ['as' => 'staff']);
    Route::resource('penulis', App\Http\Controllers\Staff\PenulisController::class, ['as' => 'staff']);
    Route::resource('buku', App\Http\Controllers\Staff\BukuController::class, ['as' => 'staff']);

    // peminjaman
    Route::resource('peminjaman', App\Http\Controllers\Staff\PeminjamanController::class,['as' => 'staff']);
    Route::get('pengajuan/show/{id}', [App\Http\Controllers\Staff\PeminjamanController::class, 'showpengajuan'])->name('staff.showpengajuan');
    Route::get('pengembalian/show/{id}', [App\Http\Controllers\Staff\PeminjamanController::class, 'showpengembalian'])->name('staff.showpengembalian');
    Route::get('pengajuan', [App\Http\Controllers\Staff\PeminjamanController::class, 'indexpengajuan'])->name('staff.indexpengajuan');
    Route::get('peminjaman', [App\Http\Controllers\Staff\PeminjamanController::class, 'indexpeminjaman'])->name('staff.indexpeminjaman');
    Route::get('pengembalian', [App\Http\Controllers\Staff\PeminjamanController::class, 'indexpengembalian'])->name('staff.indexpengembalian');
    // end peminjaman

});



Auth::routes();






// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // Route::get('', function () {
    //         return view('layouts.backend.staff');
    //     })->name('staffhome');