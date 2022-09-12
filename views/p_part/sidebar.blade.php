  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-3">
    <!-- Brand Logo -->
    <a class="brand-link">
      <div style="text-align:center;">SPINER</div>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        {{-- <div class="text-center">
          <img src="{{ asset('template/dist/img/user.png') }}" class="img-responsive" style="left:40px; position: absolute; bottom:10px">
        </div> --}}
        <a style="margin:auto;">Pegawai</a>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-1">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="/" class="nav-link">
              <i class="nav-icon fa fa-th-large"></i>
              <p>
                Beranda
                <span class="badge badge-info right"></span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('/pegawai/kinerja-pegawai')}}" class="nav-link">
              <i class="nav-icon fa fa-suitcase"></i>
              <p>
                Kinerja Pegawai
                <span class="badge badge-info right"></span>
              </p>
            </a>
          </li>
              <li class="nav-item">
                <a href="{{url('/pegawai/laporan-terverifikasi')}}" class="nav-link">
                  <i class="nav-icon fas fa-check-circle"></i>
                  <p>Laporan Terverifikasi</p>
                </a>
              </li>
          </li>
          <li class="nav-item">
            <a href="{{url('/pegawai/pengaturan')}}" class="nav-link">
              <i class="nav-icon fa fa-cog"></i>
              <p>
                Pengaturan
                <span class="badge badge-info right"></span>
              </p>
            </a>
          </li>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
<!-- /.card-header -->