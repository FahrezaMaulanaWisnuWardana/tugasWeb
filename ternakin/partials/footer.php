<?php 
  $sql = mysqli_query($con, "SELECT * FROM tb_kontak");
 ?>
    <footer class="py-5" style="background: rgba(0, 184, 148,1.0);">
      <div class="container">
        <div class="row d-flex align-items-center">
          <div class="col-lg-4" style="color: #dfe6e9">
            <h3>Ternakin</h3>
            <ul class="font-weight-bold">
              <li><a href="<?=$_ENV['base_url']?>" class="text-white">Beranda</a></li>
              <li><a href="<?=$_ENV['base_url']?>produk" class="text-white">Produk</a></li>
              <li><a href="<?=$_ENV['base_url']?>artikel" class="text-white">Artikel</a></li>
              <li><a href="<?=$_ENV['base_url']?>tentang" class="text-white">Tentang Kami</a></li>
            </ul>
          </div>
          <div class="col-lg-4" style="color: #dfe6e9">
            <h3>Kontak</h3>
            <ul class="font-weight-bold">
              <?php 
                while ($data = mysqli_fetch_array($sql)) {
                  ?>
                  <li class="link text-white"><?='<img src="'.$_ENV['base_url'].'/assets/image/kontak/'.$data['icon'].'" class="img-fluid fas fa-fw">'.' '. $data['nama']?></li>
                  <?php
                }
               ?>
            </ul>
          </div>
          <div class="col-lg-4">
            <h1 class="text-center" style="color: #dfe6e9"><img src="<?=$_ENV['base_url']?>assets/image/logo/logo2.png" style="max-width: 250px;"></h1>
          </div>
        </div>
      </div>
    </footer>