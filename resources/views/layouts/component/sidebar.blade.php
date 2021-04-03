 <aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('assets/dist/img/DPT.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-flag"></i>
              <p>
                Local
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('provinsi')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Provinsi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('kota')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kota</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('kecamatan')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kecamatan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('kelurahan')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kelurahan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('rw')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Rw</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('laporan')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kasus Local</p>
                </a>
              </li>
            </ul>
          </li>
          {{-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-globe"></i>
              <p>
                Global
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">1</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{('negara')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Negara</p>
                </a>
              </li>
            </ul>
          </li> --}}
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>