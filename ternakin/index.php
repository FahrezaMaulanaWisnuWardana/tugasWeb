<?php 
  $title="Situs jual beli hewan dan hasil hewan";
  include"config/database.php";
  include"templates/header.php";
  $sqlCarousel = mysqli_query($con,"SELECT * FROM tb_carousel");
  $sqlProduk = mysqli_query($con,"SELECT AVG(rating) as rating , tp.id_peternak , tp.id_hewan , tp.foto_produk , tp.nama_produk , tp.harga ,tp.jumlah , tb_produk_jenis.nama_jenis_produk FROM tb_produk tp 
LEFT JOIN tb_produk_jenis ON tb_produk_jenis.id_jenis_produk = tp.id_jenis_produk 
LEFT JOIN tb_transaksi tt ON tp.id_hewan = tt.id_hewan 
LEFT JOIN tb_rating tr ON tr.kd_tr_peternak = tt.kd_tr_peternak WHERE jumlah>0 GROUP BY tp.id_hewan LIMIT 4") or die(mysqli_error($con));
  $sqlKategori = mysqli_query($con,"SELECT * FROM tb_produk_jenis WHERE produk_jenis_img IS NOT NULL");
  $dataCarousel = mysqli_fetch_assoc($sqlCarousel);
?>
  </head>
  <body>
    <?php 
      include"partials/navbar.php"; 
      include"partials/carousel.php"; 
    ?>
    <div class="container" id="panel">

      <div class="col-lg-9 col-sm-12 info-panel">
        <div class="row text-center">
          <div class="col-lg-4 col-sm-12">
            <img src="https://png.pngtree.com/png-vector/20190214/ourmid/pngtree-cow-silhouette-vector-icon--black-angus-vector-illustration-png-image_434156.jpg" style="width: 150px;">
            <div class="h5 pb-5">
              Hewan Ternak
            </div>
          </div>
          <div class="col-lg-4 col-sm-12">
            <img src="https://png.pngtree.com/png-vector/20190214/ourmid/pngtree-cow-silhouette-vector-icon--black-angus-vector-illustration-png-image_434156.jpg" style="width: 150px;">
            <div class="h5 pb-5">
              Pakan Ternak
            </div>
          </div>
          <div class="col-lg-4 col-sm-12">
            <img src="https://png.pngtree.com/png-vector/20190214/ourmid/pngtree-cow-silhouette-vector-icon--black-angus-vector-illustration-png-image_434156.jpg" style="width: 150px;">
            <div class="h5 pb-5">
              Olahan Ternak
            </div>
          </div>
        </div>
      </div>

    </div>
    <div class="container">
      <!-- Produk 8 -->
      <div class="row my-5">
        <div class="w-100 text-center mb-4">
          <h3>Produk Terbaru</h3>
        </div>
        <?php 
            while ($dataProduk = mysqli_fetch_array($sqlProduk)){
              $img = explode(',', $dataProduk['foto_produk']);
              ?>
              <div class="col-lg-3 col-md-6 col-sm-12 my-1">
                <a href="<?=$_ENV['base_url']?>p/<?=str_replace(' ','-',$dataProduk['nama_produk']).'-'.$dataProduk['id_hewan']?>" style="text-decoration: none; color: inherit;">
                <div class="card overflow-hidden">
                  <div class="text-center">
                    <img src="<?=$_ENV['base_url']?>assets/image/produk/<?=$dataProduk['id_peternak'].'/'.$img[0]?>" class="card-img-top" style="width:200px;">
                  </div>
                  <div class="card-body">
                    <small class="card-text"><span class="badge badge-secondary"><?=$dataProduk['nama_jenis_produk']?></span></small>
                    <h5 class="card-title"><?=$dataProduk['nama_produk']?></h5>
                    <div class="info-card pb-2">
                      <span class="text-primary font-weight-bold d-inline">Rp.<?=number_format($dataProduk['harga'],2,',','.')?></span>
                      <div class="rating">
                        <span><?=($dataProduk['rating']!==NULL)?round($dataProduk['rating'],2):'0'?>/5</span>
                      </div>
                    </div>
                  </div>
                  </a>
                    <div class="card-body-hidden text-center pb-4">
                      <div disabled class="btn border btn-sm mb-2 <?=($dataProduk['id_peternak']==$_SESSION['user']['id'])?'':'cart'?>" data-id="<?=$dataProduk['id_hewan']?>" data-penjual="<?=$dataProduk['id_peternak']?>" data-harga="<?=$dataProduk['harga']?>"><i class="bx bxs-cart icon-single"></i> Tambahkan ke keranjang</div>
                    </div>
                  </div>
              </div>
              <?php
            }
         ?>

        <div class="w-100 text-center my-4">
          <a href="<?=$_ENV['base_url']?>produk" class="btn btn-outline-success">Semua Produk <i class="fas fa-chevron-right"></i></a>
        </div>

      </div>
      <!-- banner mid -->
      <div class="row my-5">
        <div class="col-md-8">
          <div class="d-sm-flex justify-content-between align-items-center overflow-hidden rounded-lg">
            <div class="py-4 my-2 my-md-0 py-md-5 px-4 ml-md-3 text-center text-sm-left">
              <h4 class="font-size-lg font-weight-light mb-2">Yuk beli! Sapi Limited Gahar punya cak bono</h4>
              <h3 class="mb-4">Sapi impor Zimbabwe</h3><a class="btn btn-success btn-shadow btn-sm" href="#">Beli sekarang!</a>
            </div>
            <img class="d-block ml-auto" src="https://png.pngtree.com/png-vector/20190214/ourmid/pngtree-cow-silhouette-vector-icon--black-angus-vector-illustration-png-image_434156.jpg" alt="Shop Converse">
          </div>
        </div>
        <div class="col-md-4">
          <div class="d-flex flex-column h-100 justify-content-center bg-size-cover bg-position-center rounded-lg">
            <div class="py-4 my-2 px-4 text-center">
              <div class="py-1">
                <h5 class="mb-2">Add your banner here</h5>
                <p class="font-size-sm text-muted">Hurry up to reserve your spot</p>
                <a class="btn btn-primary btn-shadow btn-sm" href="#">Contact us</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- end banner mid -->
      <!-- Kategori -->
      <div class="row my-5">

        <div class="w-100 text-center mb-4">
          <h3>Kategori Hewan</h3>
        </div>
        <?php 
            while ($dataKat = mysqli_fetch_array($sqlKategori)){
              ?>
                <div class="col-lg-3 col-md-6 col-sm-12 col-custom-card my-1">
                  
                  <div class="card" style="height: 200px;">
                      <div class="text-center">
                        <img src="<?=$_ENV['base_url']?>assets/image/kategori/<?=$dataKat['produk_jenis_img']?>" style="width:200px; z-index: -1">
                      </div>
                      <div class="custom-card">
                        <div class="card-title-custom text-center">
                          <h4><?=$dataKat['nama_jenis_produk']?></h4>
                        </div>
                    </div>
                  </div>

                </div>
              <?php
            }
         ?>
        <div class="w-100 text-center my-4">
          <a href="#" class="btn btn-outline-success">Semua Kategori <i class="fas fa-chevron-right"></i></a>
        </div>

      </div>

    </div>
    <div class="blog-info-container text-center">
      <h1><i class="fas fa-edit"></i></h1>
      <h3>Yuk baca artikel ternakin</h3>
      <p class="text-muted">Artikel terbaru seputar peternakan</p>
    </div>
    <?php include"partials/footer.php"; ?>
  </body>
    <?php include"templates/footer.php"; ?>
</html>