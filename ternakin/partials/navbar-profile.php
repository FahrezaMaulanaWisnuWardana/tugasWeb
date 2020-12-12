<?php 
  $segments = explode('/', trim(parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH),'/'));
  $numSegments = count($segments);
  $current = $segments[$numSegments-1];
  $current2 = $segments[$numSegments-2];
  if (!isset($_SESSION['user']['id'])) {
        $_SESSION['alert']['gagal'] ="Silahkan login dahulu";
        header("location:{$_ENV['base_url']}".'login'."");
  }
 ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="<?=$_ENV['base_url']?>">Logo</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item <?=($current=="profile")?'active':''?>">
        <a class="nav-link" href="<?=$_ENV['base_url']?>profile">Profile <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item <?=($current=="tambah-produk")?'active':''?>">
        <a class="nav-link" href="<?=$_ENV['base_url']?>tambah-produk">Tambah Produk</a>
      </li>
    </ul>
    <span class="navbar-text">
      <a href="<?=$_ENV['base_url']?>keluar" id="logout" class="nav-link"><i class="bx bxs-log-out"></i> Keluar</a>
    </span>
  </div>
</nav>