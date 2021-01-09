<?php 
  $title="Situs jual beli hewan dan hasil hewan";
  include"../../config/database.php";
  include"../../templates/header.php";

    $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
    $halaman_awal = ($halaman>1) ? ($halaman * 8) - 8 : 0;
    $previous = $halaman - 1;
    $next = $halaman + 1;
    $sqlKategori = mysqli_query($con,"SELECT * FROM tb_produk_jenis WHERE produk_jenis_img IS NOT NULL LIMIT $halaman_awal, 8");
    $jmlKategori = mysqli_query($con,"SELECT * FROM tb_produk_jenis WHERE produk_jenis_img IS NOT NULL");
    $jml = mysqli_num_rows($jmlKategori);
    $total_halaman = ceil($jml/8);
    $nomor = $halaman_awal+1;
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
            while ($dataKat = mysqli_fetch_array($sqlKategori)){
              ?>
                <div class="col-lg-3 col-md-6 col-sm-12 col-custom-card my-1">
                  <a href="<?=$_ENV['base_url']?>produk?kategori=<?=$dataKat['nama_jenis_produk']?>">
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
                  </a>
                </div>
              <?php
            }
         ?>
         <div class="col-12">
            <nav>
              <ul class="pagination justify-content-center">
                <li class="page-item">
                  <a class="page-link" <?php if($halaman > 1){ echo "href='?halaman=$previous'"; } ?>>Previous</a>
                </li>
                <?php 
                for($x=1;$x<=$total_halaman;$x++){
                  ?> 
                  <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                  <?php
                }
                ?>        
                <li class="page-item">
                  <a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?halaman=$next'"; } ?>>Next</a>
                </li>
              </ul>
            </nav>
         </div>
         
         </div>
        </div>
    </div>
    <?php include"../../partials/footer.php"; ?>
  </body>
    <?php include"../../templates/footer.php"; ?>
</html>