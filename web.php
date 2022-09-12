<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controller\store;
use App\Http\Controllers\KinerjaController;
use App\Http\Controllers\kinerjaController as ControllersKinerjaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('index',[
//     ]);
// });

Route::get('/', function () {
    return view('pegawai.p_dashboard',[
        "title"=>"SPINER | Beranda Pegawai"
    ]);
});

Route::get('/pegawai/dashboard', function () {
    return view('pegawai.p_dashboard',[
        "title"=>"SPINER | Beranda Pegawai"
    ]);
});

Route::get('/pegawai/kinerja-pegawai',[KinerjaController::class,'index'],
    ["title"=>"SPINER | Kinerja Pegawai"]
);
Route::post('/pegawai/kinerja-pegawai',[KinerjaController::class,'index','store'],
    ["title"=>"SPINER | Kinerja Pegawai"]
);

Route::get('pegawai/hapus/{id}', [KinerjaController::class, 'destroy'])->name('destroy');

Route::post('/pegawai/store',[KinerjaController::class,'store']);

Route::get('/pegawai/tambah-kinerja-pegawai', function () 
{
    return view('pegawai.p_tambah_kinerja',[
        "title"=>"SPINER | Tambah Kinerja"
    ]);
});

Route::get('/pegawai/edit-kinerja-pegawai', function () 
{
    return view('pegawai.p_edit_kinerja',[
        "title"=>"SPINER | Edit Kinerja"
    ]);
});

Route::get('/pegawai/laporan-terverifikasi', function () 
{
    return view('pegawai.p_laporan',[
        "title"=>"SPINER | Laporan Terverifikasi"
    ]);
});

Route::get('/pegawai/pengaturan', function () 
{
    return view('pegawai.p_pengaturan',[
        "title"=>"SPINER |  Pengaturan Pegawai"
    ]);
});

Route::get('/pegawai/edit-profil', function () {
    return view('pegawai.p_edit_profil',[
        "title"=>"SPINER |  Edit Profil Pegawai"
    ]);
});

Route::get('/pegawai/edit-password', function () {
    return view('pegawai.p_edit_password',[
        "title"=>"SPINER |  Edit Password Pegawai"
    ]);
});

Route::get('/layouts/p_settings', function () {
    return view('layouts.p_settings',[
        "title"=>"SPINER | Pengaturan"
    ]);
});

Route::get('/layouts/p_editprofile', function () {
    return view('layouts.p_editprofile',[
        "title"=>"SPINER | Ubah Profil"
    ]);
});

Route::get('/layouts/p_editpassword', function () {
    return view('layouts.p_editpassword',[
        "title"=>"SPINER | Ubah Password"
    ]);
});

Route::get('/pegawai/cari', [KinerjaController::class,'cari']);

// Route::get('/pegawai/p_kinerja',[KinerjaController::class,'index']);
// // Route::get('/pegawai/p_kinerja',[KinerjaController::class,'p_kinerja']);
// Route::post('/pegawai/p_tambah_kinerja',[KinerjaController::class,'create']);
// Route::post('/pegawai/p_kinerja',[KinerjaController::class,'store']);
