
    <?php 
      $segments = explode('/', trim(parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH),'/'));
      $numSegments = count($segments);
      $current = $segments[$numSegments-1];
      $current2 = $segments[$numSegments-2];
     ?>
    <nav class="navbar navbar-expand-md navbar-light bg-light main-menu" id="navbar" style="box-shadow:none; z-index: 99; width: 100%;">
      <div class="container">

        <span id="sidebarCollapse" class="btn text-success d-block d-md-none">
            <i class="bx bx-menu icon-single"></i>
        </span>

        <a class="navbar-brand" href="#">
          <h4 class="font-weight-bold">Logo</h4>
        </a>

        <ul class="navbar-nav ml-auto d-block d-md-none">
          <li class="nav-item">
              <a class="btn text-secondary position-relative cart-relative" href="<?=$_ENV['base_url']?>cart"><i class="bx bxs-cart icon-single"></i> <span class="badge badge-success position-absolute count-cart">0</span></a>
          </li>
        </ul>

        <div class="collapse navbar-collapse">
          <form class="form-inline my-2 my-lg-0 mx-auto w-75">
            <div class="input-group w-100">
              <input class="form-control" type="search" placeholder="Cari Produk..." aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-success"><i class="bx bx-search"></i></button>
              </div>
              <!-- <button class="btn btn-success my-2 my-sm-0" type="submit"><i class="bx bx-search"></i></button> -->
            </div>
          </form>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="btn text-secondary position-relative cart-relative" href="<?=$_ENV['base_url']?>cart"><i class="bx bxs-cart icon-single"></i> <span class="badge badge-success position-absolute count-cart">0</span></a>
            </li>
            <li class="nav-item ml-md-3">
              <a class="btn btn-success" href="<?=(isset($_SESSION['user']['id']))?$_ENV['base_url'].'profile':$_ENV['base_url'].'login'?>">
                <i class="bx bxs-user-circle mr-1"></i>
                <?=(isset($_SESSION['user']['id']))?' Halo '.$_SESSION['user']['nama'].'':' Masuk / Daftar'?>
              </a>
            </li>
          </ul>
        </div>

      </div>
    </nav>

    <nav class="navbar navbar-expand-md navbar-light bg-light sub-menu">
      <div class="container">
        <div class="collapse navbar-collapse" id="navbar">
          <ul class="navbar-nav mx-auto">
            <li class="nav-item <?=($current=="ternakin")?'active':'';?>">
              <a class="nav-link" href="<?=$_ENV['base_url']?>">Beranda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Produk</a>
            </li>
            <li class="nav-item <?=($current=="artikel" || $current2=="a")?'active':'';?>">
              <a class="nav-link" href="<?=$_ENV['base_url']?>artikel">Artikel</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Tentang Kami</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    
    <div class="search-bar d-block d-md-none">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <form class="form-inline mb-3 mx-auto">
              
                <div class="input-group w-100">
                  <input class="form-control" type="search" placeholder="Cari Produk..." aria-label="Search">
                  <div class="input-group-append">
                    <button class="btn btn-success"><i class="bx bx-search"></i></button>
                  </div>
                  <!-- <button class="btn btn-success my-2 my-sm-0" type="submit"><i class="bx bx-search"></i></button> -->
                </div>
              <!-- <input class="form-control" type="search" placeholder="Cari Produk..." aria-label="Search">
              <button class="btn btn-success" type="submit"><i class="bx bx-search"></i></button> -->
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Sidebar -->
    <nav id="sidebar">
      <div class="sidebar-header">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-10 pl-0">
              <a class="btn btn-success" href="<?=(isset($_SESSION['user']['id']))?$_ENV['base_url'].'profile':$_ENV['base_url'].'login'?>">
                <i class="bx bxs-user-circle mr-1"></i>
                <?=(isset($_SESSION['user']['id']))?' Halo '.$_SESSION['user']['nama'].'':' Masuk / Daftar'?>
              </a>
            </div>

            <div class="col-2 text-left">
              <button type="button" id="sidebarCollapseX" class="btn btn-link">
                <i class="bx bx-x icon-single"></i>
              </button>
            </div>
          </div>
        </div>
      </div>

      <ul class="list-unstyled components links">
        <li class="active">
          <a href="#"><i class="bx bx-home mr-3"></i> Home</a>
        </li>
        <li>
          <a href="#"><i class="bx bx-carousel mr-3"></i> Products</a>
        </li>
        <li>
          <a href="#"><i class="bx bx-book-open mr-3"></i> Schools</a>
        </li>
        <li>
          <a href="#"><i class="bx bx-crown mr-3"></i> Publishers</a>
        </li>
        <li>
          <a href="#"><i class="bx bx-phone mr-3"></i> Contact</a>
        </li>
      </ul>

    </nav>