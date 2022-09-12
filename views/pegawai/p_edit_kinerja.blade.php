@extends('p_layouts.main')

@section('container')
<!-- Content Header (Page header) --> 
    <div class="content-header">
    <div class="container-fluid">
      <div class="col-sm-12">
        <div class="row mb-0">
          <h1 class="md-0">Ubah Data Kinerja Pegawai</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div>
    </div>
  <!-- /.content-header -->              
<!-- form start -->
<div class="container-fluid">
  <div class="col-sm-12">
<div class="card">
              <form method="post">
                <div class="card-body">
                  @csrf
                  <div class="form-group col-md-2">
                    <label for="exampleInputTanggal">Tanggal</label>
                    <input type="date" class="form-control" id="tgl" disabled>
                  </div>
                  <div class="form-group col-md-5">
                    <label for="exampleInputHasilKinerja">Hasil Kinerja</label>
                    <textarea class="form-control" id="exampleInputHasilKinerja" rows="4" placeholder="Masukkan Hasil Kinerja"></textarea>
                  </div>
                  <div class="form-group col-md-5">
                    <label for="exampleInputFile">Bukti Foto</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Pilih file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group col-md-5">
                    <label for="exampleInputFile">Bukti Doc</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Pilih file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <div class="float-right">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                  <a href="{{url('/pegawai/kinerja-pegawai')}}" class="btn btn-warning">Batal</a>
                </div>
                </div>
              </form>
            </div>
            </div>
          </div>
    </div>
  </div>
</div>
            <!-- /.card -->
            <!-- /.content-wrapper -->
            @endsection