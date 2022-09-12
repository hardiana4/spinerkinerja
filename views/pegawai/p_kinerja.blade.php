@extends('p_layouts.main')

@section('container')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="col-sm-12">
        <div class="row mb-4">
            <h1 class="md-0">Data Kinerja Pegawai</h1>
            <div class="col box-header text-right">
                <a href="{{url('/pegawai/tambah-kinerja-pegawai')}}" class="btn btn-rounded btn-primary" style="border-radius: 30px;"><i class="fa fa-plus-circle" ></i &nbsp> Tambah Kinerja</a>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
          <div class="card-title">Show 
            <select name="#" aria-controls="#" class="custom-select custom-select-sm form-control form-control-sm" style="width: 70px">
              <option value="5">5</option>
              <option value="10">10</option>
              <option value="50">50</option>
            </select> entries</div>
            <div class="card-tools" style="padding-top: 10px;">
              <form action="" method="get">
                <h3 class="card-title">Search: </h3>
                <div class="input-group input-group-sm" style="width: 200px; padding-left:20px;">
                    <input type="text" name="keyword" class="form-control" style="padding-left:20px;">
                </div>
              </form>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row"><div class="col-sm-12 col-md-6"></div>
            <div class="col-sm-12 col-md-6"></div>
          </div><div class="row">
            <div class="col-sm-12">
              <table id="example2" class="table table-sm table-bordered table-hover dataTable dtr-inline " aria-describedby="example2_info">
            <thead>
                <th style="text-align:center">No</th>
                <th style="text-align:center">Tgl</th>
                <th style="text-align:center">Hasil</th>
                <th style="text-align:center">Foto</th>
                <th style="text-align:center">PDF</th>
                <th style="text-align:center">Aksi</th>
            </thead>
            <tbody>
              @php $no=1; @endphp
              @foreach ($kinerja as $k)
            <tr class="odd">
                <td class="text-center">{{$no++}}</td>
                <td class="text-center">{{$k->tgl}}</td>
                <td class="text-center">{{$k->hasil}}</td>
                <td class="text-center"><a href="{{ asset('template/dist/img/kinerja/'.$k['foto']) }}" class="btn btn-rounded btn-info" style="border-radius:30px;"><i class="far fa-file-image"></i></a></td>
                <td class="text-center"><a href="{{ asset('template/dist/img/kinerja/'.$k['doc']) }}" class="btn btn-rounded btn-info" style="border-radius:30px;"><i class="far fa-file-pdf"></i></a></td>                <td>
                <div class="d-grid gap-2 d-md-block" style="text-align:center">
                  <a href="{{url('/pegawai/edit-kinerja-pegawai')}}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                  <a href="/pegawai/hapus/{{ $k->id }}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                </div>
              </td>
            </tr>
            @endforeach
            </tbody>
          </table>
          <div class="my-2">
            {{$kinerja->links()}}
          </div>
        </div>
    </div>
      </div>
    </div>
        </div>
        <!-- /.card-body -->
      </div>
    </div>
  </div>
      <!-- CONTENT -->
      @endsection
