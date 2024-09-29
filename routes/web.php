<?php

use App\Http\Controllers\EmailController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsStaff;
use App\Http\Middleware\IsVrifikasi;



// Route::get('/home', [App\Http\Controllers\Auth\OtpController::class, 'index'])->name('otphome');
// Route::get('verify-account', [App\Http\Controllers\Auth\OtpController::class, 'verifyaccount'])->name('verifyAccount');
// Route::post('verifyotp', [App\Http\Controllers\Auth\OtpController::class, 'useractivation'])->name('verifyotp');


Route::get('', [App\Http\Controllers\User\PerpusController::class, 'index'])->name('AssalaamPerpustakaan');
Route::get('kirim-email', [EmailController::class, 'index']);
Route::get('show/{id}', [App\Http\Controllers\User\PerpusController::class, 'show']);
Route::get('listbuku', [App\Http\Controllers\User\PerpusController::class, 'listbuku'])->name('listbuku');
Route::get('fax', [App\Http\Controllers\User\PerpusController::class, 'fax'])->name('fax');
Route::get('hubungi', [App\Http\Controllers\User\PerpusController::class, 'hubungi'])->name('hubungi');
Route::get('filter/{id}', [App\Http\Controllers\User\PerpusController::class, 'listbuku'])->name('buku.filter');
// Route::get('penerbit/{id}', [App\Http\Controllers\User\PerpusController::class, 'listbuku'])->name('penerbit.filter');
Route::get('profilelistbuku/{id}', [App\Http\Controllers\User\PerpusController::class, 'profilelistbuku'])->name('profilelistbuku.filter');

// Route::group(['middleware' => ['auth',IsVrifikasi::class]], function () {
    Route::group(['prefix' => 'user'], function () {
        Route::group(['middleware' => ['auth']], function () {
            Route::get('verify-account', [App\Http\Controllers\Auth\OtpController::class, 'verifyaccount'])->name('verifyAccount');
            Route::post('verifyotp', [App\Http\Controllers\Auth\OtpController::class, 'useractivation'])->name('verifyotp');
            Route::get('home', [App\Http\Controllers\Auth\OtpController::class, 'index'])->name('otphome');

            Route::get('', [App\Http\Controllers\User\PerpusController::class, 'dashboard'])->name('dashboarduser');
            Route::get('profile', [App\Http\Controllers\User\ProfilController::class, 'index'])->name('profile');
            Route::patch('profile/{user}', [App\Http\Controllers\User\ProfilController::class, 'update'])->name('profile.update');
            Route::get('profilelistbuku', [App\Http\Controllers\User\PerpusController::class, 'profilelistbuku'])->name('profilelistbuku');
            Route::get('historiuser', [App\Http\Controllers\User\PerpusController::class, 'riwayat'])->name('historiuser');
            Route::resource('peminjaman', App\Http\Controllers\User\PeminjamanUserController::class);
            Route::get('peminjaman/create/{id}', [App\Http\Controllers\User\PeminjamanUserController::class, 'create'])->name('user.peminjaman.create');
            Route::get('pengajuan/show/{id}', [App\Http\Controllers\User\PeminjamanUserController::class, 'showpengajuanuser'])->name('showpengajuanuser');
            Route::get('pengembalian/show/{id}', [App\Http\Controllers\User\PeminjamanUserController::class, 'showpengembalianuser'])->name('showpengembalianuser');
            Route::get('/peminjaman/show/{id}', [App\Http\Controllers\User\PerpusController::class, 'showhistori'])->name('peminjaman.show');


            Route::resource('komentar', App\Http\Controllers\User\KomentarController::class);
            Route::resource('kontak', App\Http\Controllers\User\KontakController::class);
            Route::get('ulasan', [App\Http\Controllers\User\UlasanController::class, 'index'])->name('ulasan');
        });
    });
// });

Route::group(['prefix' => 'admin', 'middleware' => ['auth', IsAdmin::class]], function () {
    Route::get('', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('kategori', App\Http\Controllers\Admin\KategoriController::class);
    Route::resource('penerbit', App\Http\Controllers\Admin\PenerbitController::class);
    Route::resource('penulis', App\Http\Controllers\Admin\PenulisController::class);
    Route::resource('buku', App\Http\Controllers\Admin\BukuController::class);
    Route::resource('user', App\Http\Controllers\Admin\UserController::class);

    // peminjaman
    Route::resource('peminjaman', App\Http\Controllers\Admin\PeminjamanAdminrController::class, ['as' => 'admin']);
    // Route::patch('peminjaman/{id}', [App\Http\Controllers\Admin\PeminjamanAdminrController::class, 'update'])->name('admin.peminjaman.update');
    Route::get('pengajuan/show/{id}', [App\Http\Controllers\Admin\PeminjamanAdminrController::class, 'showpengajuan'])->name('showpengajuan');
    Route::get('pengembalian/show/{id}', [App\Http\Controllers\Admin\PeminjamanAdminrController::class, 'showpengembalian'])->name('showpengembalian');
    Route::get('pengajuan', [App\Http\Controllers\Admin\PeminjamanAdminrController::class, 'indexpengajuan'])->name('indexpengajuan');
    Route::get('peminjaman', [App\Http\Controllers\Admin\PeminjamanAdminrController::class, 'indexpeminjaman'])->name('indexpeminjaman');
    Route::get('pengembalian', [App\Http\Controllers\Admin\PeminjamanAdminrController::class, 'indexpengembalian'])->name('indexpengembalian');
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
    Route::resource('peminjaman', App\Http\Controllers\Staff\PeminjamanStaffrController::class, ['as' => 'staff']);
    Route::get('pengajuan/show/{id}', [App\Http\Controllers\Staff\PeminjamanStaffrController::class, 'showpengajuan'])->name('staff.showpengajuan');
    Route::get('pengembalian/show/{id}', [App\Http\Controllers\Staff\PeminjamanStaffrController::class, 'showpengembalian'])->name('staff.showpengembalian');
    Route::get('pengajuan', [App\Http\Controllers\Staff\PeminjamanStaffrController::class, 'indexpengajuan'])->name('staff.indexpengajuan');
    Route::get('peminjaman', [App\Http\Controllers\Staff\PeminjamanStaffrController::class, 'indexpeminjaman'])->name('staff.indexpeminjaman');
    Route::get('pengembalian', [App\Http\Controllers\Staff\PeminjamanStaffrController::class, 'indexpengembalian'])->name('staff.indexpengembalian');
    // end peminjaman

});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // Route::get('', function () {
    //         return view('layouts.backend.staff');
    //     })->name('staffhome');