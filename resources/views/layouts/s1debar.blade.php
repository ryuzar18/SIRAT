<!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      @if(Auth::user()->role == 1)
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('welcome') }}">
      @else
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('welcome') }}">
      @endif
        <div class="sidebar-brand-icon">
          <img src="{{url('logo1.png')}}" height="40" width="33" alt="">
        </div>
        <div class="sidebar-brand-text mx-2">SIRAT</div>
      </a>

      <!-- Nav Item - Dashboard -->
      @if(Auth::user()->role == 1)
      <!-- Divider -->
      <hr class="sidebar-divider">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Halaman Utama</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">
      <!-- Heading -->
      <div class="sidebar-heading">
        Surat dan Pegawai
      </div>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-file"></i>
          <span>Surat</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Kelola Data:</h6>
            <a class="collapse-item" href="{{ route('surat.create') }}">Tambah Data</a>
            <a class="collapse-item" href="{{ route('surat.index') }}">Lihat Data</a>
            <a class="collapse-item" href="{{ route('recycle.index') }}">Recycle Bin</a>

          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseT" aria-expanded="true" aria-controls="collapseT">
          <i class="fas fa-fw fa-user"></i>
          <span>Pegawai</span>
        </a>
        <div id="collapseT" class="collapse" aria-labelledby="headingT" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Kelola Data:</h6>
            <a class="collapse-item" href="{{ route('pegawai.create') }}">Tambah Data</a>
            <a class="collapse-item" href="{{ route('pegawai.index') }}">Lihat Data</a>
            <a class="collapse-item" href="{{ route('recycle.pegawai') }}">Recycle Bin</a>
          </div>
        </div>
      </li>

      @else

      <!-- Heading -->
      <div class="sidebar-heading">
        Admin
      </div>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
          <i class="fas fa-fw fa-user"></i>
          <span>User</span>
        </a>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Kelola pengguna:</h6>
            <a class="collapse-item" href="{{ route('users.create') }}">Tambah Data</a>
            <a class="collapse-item" href="{{ route('users.index') }}">Lihat Data</a>
          </div>
        </div>
      </li>

      @endif

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->