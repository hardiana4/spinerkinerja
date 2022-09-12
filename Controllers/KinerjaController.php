<?php

namespace App\Http\Controllers;

use App\Models\kinerja;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class kinerjaController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $kinerja = Kinerja::where('hasil','LIKE', '%'.$keyword.'%')
        ->orWhere('hasil','LIKE', '%'.$keyword.'%')
        ->paginate(2);
        return view('pegawai.p_kinerja',compact('kinerja'));
    }

    public function tambah()
    {
        return view('pegawai.p_tambah_kinerja');
    }

    // public function cari(Request $request)
	// {
	// 	// menangkap data pencarian
	// 	$get_cari = $request->cari;
 
    // 	$kinerja = Kinerja::where('hasil','LIKE','%'.'$get_cari'.'%')->get();
 
    // 		// mengirim data pegawai ke view index
	// 	return redirect('/pegawai/kinerja-pegawai',compact('kinerja'));
 
	// }

    public function store(Request $request)
    {
        $this->validate($request, [
            'tgl'     => 'required',
            'hasil'   => 'required',
            'foto'     => 'required',
            'doc'   => 'required'
        ]);

        $foto = $request->file('foto');
        $newFoto = 'foto_kinerja' . '_' . time() . '.' . $foto->extension();

        $doc = $request->file('doc');
        $newDoc = 'doc_kinerja' . '_' . time() . '.' . $doc->extension();
        
        $path = 'template/dist/img/kinerja/';
        $request->foto->move(public_path($path), $newFoto);
        $request->doc->move(public_path($path), $newDoc);

        Kinerja::create([
            'tgl' => $request->tgl,
            'hasil' => $request->hasil,
            'foto' => $newFoto,
            'doc' => $newDoc,
        ]);
        // $imageName = time().'.'.$request->foto->extension();

        // $request->foto->move(public_path('images'),$imageName);
        // kinerja::tambah($request->except(['submit']));
        Alert::question('Apakah Anda Yakin?', 'Question Message');
        return redirect('/pegawai/kinerja-pegawai');
    }

    public function destroy($id)
    {
        $kinerja = Kinerja::where('id', $id)->delete();
        return redirect('/pegawai/kinerja-pegawai'); 
        ;
    }
}