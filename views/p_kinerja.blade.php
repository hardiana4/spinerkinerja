@extends('p_layouts.main')

@section('container')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="col-sm-12">
        <div class="row mb-4">
            <h1 class="md-0">Data Kinerja Pegawai</h1>
            <div class="col box-header text-right">
                <a href="{{url('/pegawai/tambah-kinerja-pegawai')}}" class="btn btn-primary"><i class="fa fa-plus-circle" ></i &nbsp> Tambah Kinerja</a>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Show
              <div class="dropdown">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                  Dropdown link
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                  <li><a class="dropdown-item" href="#">1</a></li>
                  <li><a class="dropdown-item" href="#">2</a></li>
                  <li><a class="dropdown-item" href="#">3</a></li>
                </ul>
              </div>Entries</h3>
            <div class="card-tools" style="padding-top: 10px;">
                <h3 class="card-title">Search: </h3>
                <div class="input-group input-group-sm" style="width: 200px; padding-left:20px;"">
                    <input type="text" name="table_search" class="form-control" style="padding-left:20px;"">
                </div>
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
                <th style="text-align:center">Bukti</th>
                <th style="text-align:center">Status</th>
                <th style="text-align:center">Aksi</th>
            </thead>
            <tbody>
              @foreach ($kinerja as $k)
            <tr class="odd">
                <td>{{$k->id}}</td>
                <td>{{$k->tgl}}</td>
                <td>{{$k->hasil}}</td>
                <td>{{$k->bukti}}</td>
                <td>{{$k->status}}</td>
                <td>
                <div class="d-grid gap-2 d-md-block" style="text-align:center">
                  <a href="{{url('/pegawai/edit-kinerja-pegawai')}}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                    <button class="btn btn-danger" type="button"><i class="fa fa-trash"></i></button>
                </div>
              </td>
            </tr>
            @endforeach
            <tr class="even">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              <td>
                <div class="d-grid gap-2 d-md-block" style="text-align:center">
                  <a href="{{url('/pegawai/edit-kinerja-pegawai')}}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                    <button class="btn btn-danger" type="button"><i class="fa fa-trash"></i></button>
                </div>
              </td>
            </tr>
            </tbody>
          </table>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-9 col-md-9">
            <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to 10 of 30 entries
            </div>
        </div>
          <div class="col-sm-3 col-md-3" style="float: right;">
              <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                    <ul class="pagination">
                        <li class="paginate_button page-item previous disabled" id="example2_previous">
                            <a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
                        </li>
                        <li class="paginate_button page-item active">
                            <a href="#" aria-controls="example2" data-dt-idx="1" tabindex="0" class="page-link">1</a>
                        </li>
                        <li class="paginate_button page-item ">
                            <a href="#" aria-controls="example2" data-dt-idx="2" tabindex="0" class="page-link">2</a>
                        </li>
                        <li class="paginate_button page-item ">
                            <a href="#" aria-controls="example2" data-dt-idx="3" tabindex="0" class="page-link">3</a>
                        </li>
                        <li class="paginate_button page-item next" id="example2_next">
                            <a href="#" aria-controls="example2" data-dt-idx="7" tabindex="0" class="page-link">Next</a>
                        </li>
                    </ul>
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