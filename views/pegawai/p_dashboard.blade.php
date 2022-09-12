@extends('p_layouts.main')

@section('container') 
<!-- CONTENT -->
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="md-0">Beranda</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div><!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
          <!-- ./col -->
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-purple">
                <div class="inner">
                  <h3>1</h3>
                  <p>Kinerja Pegawai</p>
                </div>
                <div class="icon">
                  <i class="nav-icon fa fa-suitcase"></i>
                </div>
                <a href="{{url('/pegawai/kinerja-pegawai')}}" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3>1</h3>
                  <p>Laporan</p>
                </div>
                <div class="icon">
                  <i class="ionicons ion-document-text"></i>
                </div>
                <a href="{{url('/pegawai/laporan-terverifikasi')}}" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div>
          </div><!-- ./col -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- CONTENT -->
    @endsection