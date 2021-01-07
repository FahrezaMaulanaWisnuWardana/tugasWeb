<?php 
  $title="Situs jual beli hewan dan hasil hewan";
  include"../../config/database.php";
  include"../../templates/header.php";
    $sqlProd = mysqli_query($con,"SELECT AVG(rating) as rating , tp.id_peternak , tp.id_hewan , tp.foto_produk , tp.nama_produk , tp.harga ,tp.jumlah , tb_produk_jenis.nama_jenis_produk FROM tb_produk tp LEFT JOIN tb_produk_jenis ON tb_produk_jenis.id_jenis_produk = tp.id_jenis_produk LEFT JOIN tb_transaksi tt ON tp.id_hewan = tt.id_hewan LEFT JOIN tb_rating tr ON tr.kd_tr_peternak = tt.kd_tr_peternak WHERE jumlah>0 GROUP BY tp.id_hewan");
  ?>
  </head>
  <body>
    <?php 
      include"../../partials/navbar.php"; 
    ?>
    <div class="container">
      <!-- Produk 8 -->
      <div class="row my-5">

        <?php 
            while ($dataProduk = mysqli_fetch_array($sqlProd)){
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
                        (200)
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
         
         </div>
        </div>
    </div>
    <?php include"../../partials/footer.php"; ?>
  </body>
    <?php include"../../templates/footer.php"; ?>
</html>