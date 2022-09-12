@extends('p_layouts.main')

@section('container')

<!-- Content Header (Page header) --> 
    <div class="content-header">
    <div class="container-fluid">
      <div class="col-sm-12">
        <div class="row mb-0">
          <h1 class="md-0">Tambah Data Kinerja Pegawai</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div>
    </div>
  <!-- /.content-header -->              
<!-- form start -->
<div class="container-fluid">
  <div class="col-sm-12">
    <div class="card">
              {{-- <form action="/pegawai/kinerja-pegawai" method="post" enctype="multipart/form-data"> --}}
              <form action="/pegawai/store" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  @csrf
                  <div class="form-group col-md-4">
                    <label for="tgl">Tanggal</label>
                    <input type="date" class="form-control @error('tanggal') is-invalid @enderror" name="tgl" id="tgl"  value="{{date("d-m-Y")}}">
                    @error('tgl')
                      <div class="alert alert-danger mt-2">
                          {{ $message }}
                      </div>
                  @enderror
                  </div>
                  <div class="form-group col-md-5">
                    <label for="hasil">Hasil Kinerja</label>
                    <textarea class="form-control @error('hasil') is-invalid @enderror" id="hasil" name="hasil" rows="4" placeholder="Masukkan Hasil Kinerja"></textarea>
                    @error('hasil')
                      <div class="alert alert-danger mt-2">
                          {{ $message }}
                      </div>
                  @enderror
                  </div>
                  <div class="form-group col-md-5">
                    <label for="foto">Bukti Foto</label>
                    <div class="input-group">
                      <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto" accept="image/*">
                    </div>
                  </div>
                  <div class="form-group col-md-5">
                    <label for="doc">Bukti Document</label>
                    <div class="input-group">
                      <input type="file" class="form-control @error('doc') is-invalid @enderror" id="doc" name="doc">
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <div class="float-right">
                    <button class="btn btn-primary" onclick="swal({
                      title: 'Yakin Ingin Menyimpan ?',
                      text: 'Pastikan data yang Anda masukan sudah benar',
                      icon: 'warning',
                      buttons: true,
                      dangerMode: true,
                    })
                    .then((willSave) => {
                      if (willSave) {
                        swal('Berhasil disimpan', {
                          icon: 'success',
                        });
                      } else {
                        swal('Gagal Menyimpan');
                      }
                    });
                    ">Simpan</button>
                    <a href="{{url('/pegawai/kinerja-pegawai')}}" class="btn btn-warning">Batal</a>
                  </div>
                </div>
              </form>
            </div>=
            </div>
          </div>
    </div>
  </div>
</div>
{{-- @include('sweetalert::alert')
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script> --}}
<script>
    CKEDITOR.replace( 'content' );
</script>
<!-- /.card -->
<!-- /.content-wrapper -->
@endsection