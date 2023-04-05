@extends('layouts.app')

    @section('title', 'Pengawas')

    @push('style')
    
    @endpush

    @section('main')
        <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1>Pengawas</h1>
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="{{url('/beranda')}}">Beranda</a></div>
                        <div class="breadcrumb-item"><a href="{{url('/pengawas')}}">Pengawas</a></div>
                        <div class="breadcrumb-item">Ubah Pengawas</div>
                    </div>
                </div>
                <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Ubah Pengawas</h4>
                        </div>
                        <div class="card-body">
                          <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                              <label>Nama</label>
                              <input type="text" name="nama" class="form-control @error('nama')
                              is-invalid
                              @enderror" id="nama" 
                              value="{{$pengawas->nama}}"
                              autofocus='true' placeholder="Masukan nama">
                              @error('nama')
                                      <div class='invalid-feedback'>
                                          {{ $message }}
                                      </div>
                              @enderror
                          </div>
                          <div class="form-group">
                              <label>Email</label>
                              <input type="text" name="email" class="form-control @error('email')
                              is-invalid
                              @enderror" id="email" 
                              value="{{$pengawas->email}}"
                              placeholder="Masukan email" readonly>
                              @error('email')
                                      <div class='invalid-feedback'>
                                          {{ $message }}
                                      </div>
                              @enderror
                          </div>
                          <div class="form-group">
                            <label>Kata Sandi</label>
                            <input type="text" name="password" class="form-control @error('password')
                            is-invalid
                            @enderror " id="password" 
                            value="{{$pengawas->kata_sandi}}"
                            placeholder="Masukan kata sandi" readonly>
                            @error('password')
                                    <div class='invalid-feedback'>
                                        {{ $message }}
                                    </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Prodi</label><br> 
                            <select class="form-control selectric
                            @error('id_prodi')
                            is-invalid
                            @enderror" name="id_prodi"
                              id="id_prodi" placeholder="- Pilih Prodi -" value="{{ old('prodi') }}">
                                <option value="">- Pilih Prodi -</option>
                                @foreach ($prodi as $data)
                                <option value="{{$data->id}}" {{($pengawas->id_prodi == $data->id)? 'selected': ''; }} >{{$data->prodi}}</option>
                                @endforeach
                            </select>
                            @error('id_prodi')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                           <div class="form-group">
                              <label>Jabatan</label>
                              <div class="selectgroup w-100">
                                  <label class="selectgroup-item">
                                    <input type="radio" name="jabatan" value="Dosen" {{($pengawas->jabatan == 'Dosen')? 'checked': ''; }} class="selectgroup-input" checked="">
                                    <span class="selectgroup-button">Dosen</span>
                                  </label>
                                  <label class="selectgroup-item">
                                    <input type="radio" name="jabatan" value="Teknisi" {{($pengawas->jabatan == 'Teknisi')? 'checked': ''; }} class="selectgroup-input">
                                    <span class="selectgroup-button">Teknisi</span>
                                  </label>
                              </div>
                          </div>
                           <div class="form-group">
                              <label>Kuota</label>
                              <div class="selectgroup w-100">
                                  <label class="selectgroup-item">
                                    <input type="radio" name="kuota" value="1" {{ ($pengawas->kuota == '1')? 'checked': ''; }} class="selectgroup-input" checked="">
                                    <span class="selectgroup-button">1</span>
                                  </label>
                                  <label class="selectgroup-item">
                                    <input type="radio" name="kuota" value="2" {{ ($pengawas->kuota == '2')? 'checked': ''; }} class="selectgroup-input">
                                    <span class="selectgroup-button">2</span>
                                  </label>
                                  <label class="selectgroup-item">
                                    <input type="radio" name="kuota" value="3" {{ ($pengawas->kuota == '3')? 'checked': ''; }} class="selectgroup-input">
                                    <span class="selectgroup-button">3</span>
                                  </label>
                                  <label class="selectgroup-item">
                                    <input type="radio" name="kuota" value="4" {{ ($pengawas->kuota == '4')? 'checked': ''; }} class="selectgroup-input">
                                    <span class="selectgroup-button">4</span>
                                  </label>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                            <div class="row float-right" style="margin: 0px 0px 25px;">
                                <a href="{{url('/pengawas')}}" type="button" class="btn btn-danger">Batal</a>&nbsp;
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        </div>    
        @endsection

