<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use App\Models\Kelas;
use App\Models\Mahasiswa;
use App\Models\Ruangan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    //Prodi
    public function prodi()
    {
        $user = Auth::User();
        $prodi = Prodi::all();
        $data = array
        (
            'prodi' => $prodi
        );
        return view("pages.admin.kelola.prodi.prodi", ['type_menu' => ''], compact('user','prodi'))->with([$data]);
    }

    public function tambah_prodi()
    {
        $user = Auth::User();
        $prodi = Prodi::all();
        return view("pages.admin.kelola.prodi.tambah_prodi", ['type_menu' => ''], compact('user','prodi'));
    }

    public function create_prodi(Request $request)
    { 
        $prodi = ($request->jenjang)." ".($request->nama_prodi);
        $validated = $request->validate([
            'jenjang'       => 'required',
            'nama_prodi'       => 'required|unique:prodi',
            'singkatan'      => 'required|unique:prodi',
        ],
        [
            'jenjang.required' => 'Mohon isi terlebih dahulu.',
            'nama_prodi.required' => 'Mohon isi terlebih dahulu.',
            'nama_prodi.unique' => 'Nama prodi sudah ada, silakan cek kembali.',
            'singkatan.required' => 'Mohon isi terlebih dahulu.',
            'singkatan.unique' => 'Singkatan sudah ada, silakan cek kembali.',
        ]);
            Prodi::create([
            'jenjang' => $request->jenjang,
            'nama_prodi' => $request->nama_prodi,
            'prodi' => $prodi,
            'singkatan' => $request->singkatan,
        ]);
        return redirect('/prodi')->with('success', 'Prodi berhasil ditambahkan.');   
    }

    public function ubah_prodi($id)
    {
        $user = Auth::User();
        $prodi = Prodi::find($id);
        return view("pages.admin.kelola.prodi.ubah_prodi", ['type_menu' => ''], compact('user','prodi'));
    }

    public function update_prodi(Request $request, $id, Prodi $prodi)
    {
        $prodi = Prodi::find($id);
        $validated = $request->validate([
            'jenjang'       => 'required',
            'nama_prodi'       => 'required',
            'singkatan'      => 'required',
        ],
        [
            'jenjang.required' => 'Mohon isi terlebih dahulu.',
            'nama_prodi.required' => 'Mohon isi terlebih dahulu.',
            'singkatan.required' => 'Mohon isi terlebih dahulu.',
        ]);
        $prodi->update([
        $prodibaru = ($request->jenjang)." ".($request->nama_prodi),
        $prodi->jenjang = $request->jenjang,
        $prodi->nama_prodi = $request->nama_prodi,
        $prodi->prodi = $prodibaru,
        $prodi->singkatan = $request->singkatan,
        ]);
        return redirect('/prodi')->with('success', 'Prodi berhasil diubah.');
    }

    public function hapus_prodi($id)
    {
        $prodi = Prodi::find($id);
        $prodi->delete();
        // Alert::success('Berhasil', 'Data berhasil dihapus ');
        return redirect('/prodi')->with('success','Prodi berhasil dihapus');
    }

    //Kelas
    public function kelasD3()
    {
        $user = Auth::User();
        $id_prodi = Prodi::find('id');
        $kelas = Kelas::with('nama_prodi')->whereHas('prodi', function ($q) use ($id_prodi) {
                $q->where('jenjang','D3');
        })->get();
        $prodi_D3 = Prodi::select('id','prodi')->where('jenjang','D3')->get();
        // $kelas = Kelas::with('nama_prodi')->get();
        $data = array
        (
            'kelas' => $kelas
        );
        return view("pages.admin.kelola.kelas.D3.kelasD3", ['type_menu' => 'kelas'], compact('user','kelas','prodi_D3'))->with([$data]);
    }

    public function kelasD4()
    {
        $user = Auth::User();
        $id_prodi = Prodi::find('id');
        $kelas = Kelas::with('nama_prodi')->whereHas('prodi', function ($q) use ($id_prodi) {
                $q->where('jenjang','D4');
        })->get();
        $prodi_D4 = Prodi::select('id','prodi')->where('jenjang','D4')->get();
        // $kelas = Kelas::with('nama_prodi')->get();
        $data = array
        (
            'kelas' => $kelas
        );
        return view("pages.admin.kelola.kelas.D4.kelasD4", ['type_menu' => 'kelas'], compact('user','kelas','prodi_D4'))->with([$data]);
    }

    public function create_kelasD3(Request $request)
    { 
        $singkatan = Prodi::where('id', $request->id_prodi)->value('singkatan');
        $tingkat = $request->tingkat;
        $kode = $request->kode;
        $kelas = ($singkatan)."-".($tingkat).($kode);   
        $count_kelas = Kelas::where([
            'kelas' => $kelas,
        ]);

        if($count_kelas->count() > 0)
        {    
            return redirect('/kelas-D3')->with('error','Kelas sudah ada, silakan cek kembali');
        }
        else
        {
            Kelas::create([
            'id_prodi' => $request->id_prodi,
            'tingkat' => $request->tingkat,
            'kode' => $request->kode,
            'kelas' => $kelas, 
        ]);
        return redirect('/kelas-D3')->with('success', 'Kelas berhasil ditambahkan.');   
        }
    }
    public function create_kelasD4(Request $request)
    { 
        $singkatan = Prodi::where('id', $request->id_prodi)->value('singkatan');
        $tingkat = $request->tingkat;
        $kode = $request->kode;
        $kelas = ($singkatan)."-".($tingkat).($kode);

        $count_kelas = Kelas::where([
            'kelas' => $kelas,
        ]);

        if($count_kelas->count() > 0)
        {    
            return redirect('/kelas-D4')->with('error','Kelas sudah ada, silakan cek kembali');
        }
        else    
        {
            Kelas::create([
            'id_prodi' => $request->id_prodi,
            'tingkat' => $request->tingkat,
            'kode' => $request->kode,
            'kelas' => $kelas, 
        ]);
        return redirect('/kelas-D4')->with('success', 'Kelas berhasil ditambahkan.');   
        }
    }

    public function update_kelasD3(Request $request, $id)
    {
        $kelas = Kelas::find($id);
        $kode = $request->kode;
        $tingkat = $request->tingkat;
        $singkatan = Prodi::where('id', $request->id_prodi)->value('singkatan');
        $kelasbaru = ($singkatan)."-".($tingkat).($kode);
        $kelas->id_prodi = $request->id_prodi;
        $kelas->tingkat = $request->tingkat;
        $kelas->kode = $request->kode;
        $kelas->kelas = $kelasbaru;
        $kelas->save();
        return redirect('/kelas-D3')->with('success', 'Kelas berhasil diubah.');
    }

    public function update_kelasD4(Request $request, $id)
    {
        $kelas = Kelas::find($id);
        $kode = $request->kode;
        $tingkat = $request->tingkat;
        $singkatan = Prodi::where('id', $request->id_prodi)->value('singkatan');
        $kelasbaru = ($singkatan)."-".($tingkat).($kode);
        $kelas->id_prodi = $request->id_prodi;
        $kelas->tingkat = $request->tingkat;
        $kelas->kode = $request->kode;
        $kelas->kelas = $kelasbaru;
        $kelas->save();
        return redirect('/kelas-D4')->with('success', 'Kelas berhasil diubah.');
    }

    public function hapus_kelasD3($id)
    {
        $kelas = Kelas::find($id);
        $kelas->delete();
        return redirect('/kelas-D3')->with('success','Kelas berhasil dihapus');
    }

    public function hapus_kelasD4($id)
    {
        $kelas = Kelas::find($id);
        $kelas->delete();
        return redirect('/kelas-D4')->with('success','Kelas berhasil dihapus');
    }

    //Pengguna
    public function pengawas(){
        $user = Auth::User();
        $pengawas = User::with('prodi')->where("level","pengawas")->get();
        $prodi = Prodi::select('id','prodi')->get();
        $data = array
        (
            'user' => $pengawas
        );
        return view("pages.admin.kelola.pengguna.pengawas.pengawas", ['type_menu' => 'pengguna'], compact('user','pengawas','prodi'))->with([$data]);
    }

    public function tambah_pengawas()
    {
        $user = Auth::User();
        $pengawas = User::with('prodi')->where("level","pengawas")->get();
        $prodi = Prodi::select('id','prodi')->get();
        return view("pages.admin.kelola.pengguna.pengawas.tambah_pengawas", ['type_menu' => 'pengguna'], compact('user','prodi','pengawas'));
    }

    public function create_pengawas(Request $request)
    { 
        $password = "Abcd1234*";
        $level = "pengawas";
        $validated = $request->validate([
            'nama'       => 'required|unique:users',
            'email'       => 'required|email|unique:users',
            'id_prodi'       => 'required',
            'jabatan'       => 'required',
            'kuota'      => 'required',
        ],
        [
            'nama.required' => 'Mohon isi terlebih dahulu.',
            'nama.unique' => 'Nama sudah ada, silakan cek kembali.',
            'email.required' => 'Mohon isi terlebih dahulu.',
            'email.unique' => 'Email sudah ada, silakan cek kembali.',
            'id_prodi.required' => 'Mohon isi terlebih dahulu.',
            'jabatan.required' => 'Mohon isi terlebih dahulu.',
            'kuota.required' => 'Mohon isi terlebih dahulu.',
        ]);
            User::create([
                'nama' => $request->nama,
                'email' => $request->email,
                'id_prodi' => $request->id_prodi,
                'password' => Hash::make($password),
                'kata_sandi' => $password,
                'jabatan' => $request->jabatan,
                'kuota' => $request->kuota,
                'level' => $level,
        ]);
        return redirect('/pengawas')->with('success', 'Pengawas berhasil ditambahkan.');   
    }

    public function ubah_pengawas($id)
    {
        $user = Auth::user();
        $pengawas = User::findOrFail($id);
        $pengawas->join('prodi', 'prodi.id','=', 'users.prodi_id')
        ->select('users.id','users.nama','users.email','users.kata_sandi','users.jabatan','users.kuota','prodi.nama_prodi');
        $prodi = Prodi::all();
        return view("pages.admin.kelola.pengguna.pengawas.ubah_pengawas", ['type_menu' => 'pengguna'], compact('user','pengawas','prodi'));
    }

    public function update_pengawas(Request $request, $id)
    {
        $pengawas = User::find($id);
        $validated = $request->validate([
            'ubah_nama'       => 'required',
            'ubah_email'       => 'required|email',
            'password'       => 'required|string|min:8|confirmed|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/',
        ],
        [
            'ubah_nama.required' => 'Mohon isi terlebih dahulu.',
            'ubah_email.required' => 'Mohon isi terlebih dahulu.',
            'ubah_email.unique' => 'Email sudah ada, silakan cek kembali.',
            'password.required' => 'Mohon isi terlebih dahulu.',
            'password.min' => 'Kata sandi harus lebih dari 8 karakter.',
            'password.regex' => 'Kata sandi harus mengandung setidaknya 1 simbol',
        ]);
        $pengawas->nama = $request->ubah_nama;
        $pengawas->email = $request->ubah_email;
        $pengawas->password = Hash::make($request->password);
        $pengawas->kata_sandi = $request->password;
        $pengawas->id_prodi = $request->ubah_id_prodi;
        $pengawas->jabatan = $request->ubah_jabatan;
        $pengawas->kuota = $request->ubah_kuota;
        $pengawas->save();
    }

    public function hapus_pengawas($id)
    {
        $pengawas = User::find($id);
        $pengawas->delete();
        //Alert::success('Berhasil', 'Data berhasil dihapus ');
        return redirect('/pengawas')->with('success','Pengawas berhasil dihapus');
    }

    public function petugas()
    {
        $user = Auth::User();
        $petugas = User::all()->where("level","petugas");
        $data = array
        (
            'user' => $petugas
        );
        return view("pages.admin.kelola.pengguna.petugas.petugas", ['type_menu' => 'pengguna'], compact('user','petugas'))->with([$data]);
    }

    public function ubah_petugas($id)
    {
        $user = Auth::user();
        $petugas = User::findOrFail($id);
        $petugas->User::get();
        return view("pages.admin.kelola.pengguna.petugas.ubah_petugas", ['type_menu' => 'pengguna'], compact('user','petugas'));
    }

    public function update_petugas(Request $request, $id)
    {
        $validated = $request->validate([
            'password'       => 'required|string|min:8|confirmed|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/',
        ],
        [
                'password.required' => 'Mohon isi terlebih dahulu.',
                'password.min' => 'Kata sandi harus lebih dari 8 karakter.',
                'password.regex' => 'Kata sandi harus mengandung setidaknya 1 simbol',
        ]);
        $petugas = User::find($id);
        $petugas->nama = $request->nama;
        $petugas->email = $request->email;
        $petugas->password = Hash::make($request->password);
        $petugas->kata_sandi = $request->password;
        $petugas->save();
        return redirect('/petugas')->with('success', 'Petugas berhasil diubah.');
    }

    //Mahasiswa
    public function mahasiswa()
    {
        $user = Auth::User();
        $mahasiswa = Mahasiswa::all();
        $prodi = Prodi::select('id','prodi')->get();
        $dosen = User::select('id','nama')->where('jabatan','Dosen')->get();
        $data = array
        (
            'mahasiswa' => $mahasiswa
        );
        return view("pages.admin.kelola.mahasiswa.D3.mahasiswaD3", ['type_menu' => 'mahasiswa'], compact('user','mahasiswa','prodi','dosen'))->with([$data]);
    }

    //Ruangan
    public function ruangan()
    {
        $user = Auth::User();
        $ruangan = Ruangan::all();
        $data = array
        (
            'ruangan' => $ruangan
        );
        return view("pages.admin.pelaksanaan.ruangan.ruangan", ['type_menu' => ''], compact('user','ruangan'))->with([$data]);
    }

    public function create_ruangan(Request $request)
    { 
        $validated = $request->validate([
            'ruangan'       => 'required|unique:ruangan',
        ],
        [
            'ruangan.required' => 'Mohon isi terlebih dahulu.',
            'ruangan.unique' => 'Nama ruangan sudah ada, silakan cek kembali.',
        ]);
            Ruangan::create([
            'ruangan' => $request->ruangan,
        ]);
        return redirect('/ruangan')->with('success', 'Ruangan berhasil ditambahkan.');   
    }

    public function update_ruangan(Request $request, $id)
    {
        $ruangan = Ruangan::find($id);
        $validated = $request->validate([
            'ruangan'       => 'required|unique:ruangan,ruangan',
        ],
        [
            'ruangan.required' => 'Mohon isi terlebih dahulu.',
            'ruangan.unique' => 'Nama ruangan sudah ada, silakan cek kembali.',
        ]);
        
        $ruangan->ruangan = $request->ruangan;
        $ruangan->save();
        return redirect('/ruangan')->with('success', 'Ruangan berhasil diubah.');
    }

    //Pengaturan
    public function pengaturan()
    {
        return redirect('/pengaturan-admin');
    }
}
