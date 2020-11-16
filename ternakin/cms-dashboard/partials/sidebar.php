
    <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background: rgb(44,62,80); transition: 0.4s;">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?=$_ENV['base_url']?>cms-dashboard/home">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-cat"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Ternakin</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="<?=$_ENV['base_url']?>cms-dashboard/home">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Master
      </div>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#artikel" aria-expanded="true" aria-controls="artikel">
          <i class="fas fa-fw fa-clipboard"></i>
          <span>Artikel</span>
        </a>
        <div id="artikel" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?=$_ENV['base_url']?>cms-dashboard/pages/artikel">List Artikel</a>
            <a class="collapse-item" href="<?=$_ENV['base_url']?>cms-dashboard/pages/artikel/kategori-artikel">Kategori Artikel</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#peternak" aria-expanded="true" aria-controls="peternak">
          <i class="fas fa-fw fa-users"></i>
          <span>Peternak</span>
        </a>
        <div id="peternak" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?=$_ENV['base_url']?>cms-dashboard/peternak">Data Peternak</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#lokasi" aria-expanded="true" aria-controls="daerah">
          <i class="fas fa-fw fa-map-marker-alt"></i>
          <span>Lokasi</span>
        </a>
        <div id="lokasi" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?=$_ENV['base_url']?>cms-dashboard/pages/lokasi/provinsi">Provinsi</a>
            <a class="collapse-item" href="<?=$_ENV['base_url']?>cms-dashboard/pages/lokasi/kota">Kota</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#transaksi" aria-expanded="true" aria-controls="transaksi">
          <i class="fas fa-fw fa-list-alt"></i>
          <span>Transaksi</span>
        </a>
        <div id="transaksi" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?=$_ENV['base_url']?>cms-dashboard/transaksi">Data Transaksi</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#master-web" aria-expanded="true" aria-controls="master-web">
          <i class="fas fa-fw fa-network-wired"></i>
          <span>CMS</span>
        </a>
        <div id="master-web" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?=$_ENV['base_url']?>cms-dashboard/pages/cms">Data CMS</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#master-user" aria-expanded="true" aria-controls="master-user">
          <i class="fas fa-fw fa-users"></i>
          <span>Users</span>
        </a>
        <div id="master-user" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?=$_ENV['base_url']?>cms-dashboard/pages/users">Daftar Users</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>