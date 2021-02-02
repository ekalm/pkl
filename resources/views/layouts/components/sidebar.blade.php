<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" class="brand-image img-circle elevation-5" style="opacity: .7">
      <span class="brand-text font-weight-light">COVID-19</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('assets/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
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
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
          <layouti class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Kasus Local
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{route('provinsi.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Provinsi</p>
                </a>
              </li>
                </a>
              </li>
              <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('kota.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kota</p>
                </a>
              </li>
               </lu>
              <li class="nav-item">
                <a href="{{route('kecamatan.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kecamatan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('desa.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kelurahan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('rw.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Rw</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('kasus.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kasus</p>
                </a>
              </li>
            </ul>
              </li>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>