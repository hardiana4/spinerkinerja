<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

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
//Landing Page
Route::get("/", function(){return view("pages.tamu.index");});

//Cek Dashboard sebelum login
Route::get("/home", [BerandaController::class, "index"])->middleware("auth");
Route::get("/beranda", [BerandaController::class, "index"])->middleware("auth");


// Login
Route::controller(LoginController::class)->group(function () {
    Route::get("/", "index")->name("masuk");
    Route::post("masuk/proses", "proses");
    Route::get("keluar", "keluar");
});

//Admin
Route::group(["middleware" => ["auth"]], function () {
    Route::group(["middleware" => ["level:admin"]], function () {
        //Prodi
        Route::get("/prodi",[AdminController::class,"prodi"])->name('prodi');
        Route::get("/tambah-prodi",[AdminController::class,"tambah_prodi"])->name('tambah.prodi');
        Route::post("/tambah-prodi-proses", [AdminController::class,"create_prodi"])->name('create.prodi');
        Route::get("/ubah-prodi/{id}",[AdminController::class,"ubah_prodi"])->name('ubah.prodi');
        Route::post("/update-prodi/{id}", [AdminController::class,"update_prodi"])->name('update.prodi');
        Route::get("/hapus-prodi/{id}", [AdminController::class,"hapus_prodi"])->name('delete.prodi');


        //Pengguna
        Route::get("/pengawas",[AdminController::class,"pengawas"]);
        Route::get("/tambah-pengawas",[AdminController::class,"tambah_pengawas"]);
        Route::post("/tambah-pengawas-proses", [AdminController::class,"create_pengawas"]);
        Route::get("/ubah-pengawas/{id}",[AdminController::class,"ubah_pengawas"])->name('ubah.pengawas');
        Route::post("/update-pengawas/{id}", [AdminController::class,"update_pengawas"]);
        Route::get("/hapus-pengawas/{id}", [AdminController::class,"hapus_pengawas"]);

        Route::get("/petugas",[AdminController::class,"petugas"]);
        Route::post("/tambah-petugas", [AdminController::class,"create_petugas"]);
        Route::get("/ubah-petugas",[AdminController::class,"ubah_petugas"]);
        Route::post("/update-petugas/{id}", [AdminController::class,"update_petugas"]);
        Route::get("/hapus-petugas/{id}", [AdminController::class,"hapus_petugas"]);

        // //Kelas Prodi D3
        // Route::get("/kelas-D3",[AdminController::class,"kelasD3"]);
        // Route::post("/tambah-kelasD3-proses", [AdminController::class,"create_kelasD3"]);
        // Route::get("/hapus-kelas-D3/{id}", [AdminController::class,"hapus_kelasD3"]);
        // Route::post("/update-kelasD3-proses/{id}", [AdminController::class,"update_kelasD3"]);

        // //Kelas Prodi D4
        // Route::get("/kelas-D4",[AdminController::class,"kelasD4"]);
        // Route::post("/tambah-kelasD4-proses", [AdminController::class,"create_kelasD4"]);
        // Route::get("/hapus-kelas-D4/{id}", [AdminController::class,"hapus_kelasD4"]);
        // Route::post("/update-kelasD4-proses/{id}", [AdminController::class,"update_kelasD4"]);
       
        //Mahasiswa
        Route::get("/mahasiswa-D3", [AdminController::class,"mahasiswa"]);

        //Ruangan
        Route::get("/ruangan",[AdminController::class,"ruangan"]);
        Route::post("/tambah-ruangan", [AdminController::class,"create_ruangan"]);
        Route::post("/update-ruangan-proses/{id}", [AdminController::class,"update_ruangan"]);
        Route::get("/hapus-ruangan/{id}", [AdminController::class,"hapus_ruangan"]);
    });
});


//Petugas
Route::group(["middleware" => ["auth"]], function () {
    Route::group(["middleware" => ["level:petugas"]], function () {
        
        });
    });

//Pengawas
Route::group(["middleware" => ["auth"]], function () {
    Route::group(["middleware" => ["level:pengawas"]], function () {
        
        });
    });
