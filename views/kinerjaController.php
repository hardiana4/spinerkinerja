<?php

namespace App\Http\Controllers;

use App\Models\kinerja;
use Illuminate\Http\Request;

class kinerjaController extends Controller
{
    public function index()
    {
        $kinerja=Kinerja::all();
        return view('pegawai.p_kinerja',compact('kinerja'));
    }

    public function tambah()
    {
        return view('pegawai.p_tambah_kinerja');
    }

    public function store(Request $request)
    {
        kinerja::tambah($request->except(['submit']));
        return redirect('/pegawai/kinerja-pegawai');
    }
}