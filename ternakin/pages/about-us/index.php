    <?php 
      $title="Situs jual beli hewan dan hasil hewan";
      include"../../config/database.php";
      include"../../templates/header.php";
      $sqldaerah = mysqli_query($con,"SELECT COUNT(DISTINCT(id_kota)) as kota FROM tb_peternak ");
      $daerah = mysqli_fetch_assoc($sqldaerah);
      $sqlpeternak = mysqli_query($con,"SELECT COUNT(*) as peternak FROM tb_peternak");
      $peternak = mysqli_fetch_assoc($sqlpeternak);
      $sqlproduk = mysqli_query($con,"SELECT COUNT(*) as produk FROM tb_produk");
      $produk = mysqli_fetch_assoc($sqlproduk);
    ?>
  </head>
  <body>
    <?php 
      include"../../partials/navbar.php";
    ?>
    <div class="head-about text-white" style="height: 50vh;">
      <div class="bg-shadow d-flex align-items-center">
        <div class="container">
            <div class="row p-3 text-justify">
              <p class="h1 text-uppercase" style="text-decoration: underline;">Ternakin</p>
              Ternakin merupakan Marketplace di mana para peternak dapat memperjual belikan hasil ternaknya sekaligus mendapatkan informasi tentang harga pasaran ataupun informasi cara beternak yang dapat menyejahterakan peternak di Indonesia.
            </div>
        </div>
      </div>
    </div>
    <div class="jumbotron" style="height: 50vh">
      <div class="container text-center">
          <p class="h1 text-uppercase">Ternakin</p>
          Ternakin merupakan Marketplace di mana para peternak dapat memperjual belikan hasil ternaknya sekaligus mendapatkan informasi tentang harga pasaran ataupun informasi cara beternak yang dapat menyejahterakan peternak di Indonesia.
          <a href="<?=$_ENV['base_url']?>login" class="d-block text-uppercase h2 text-link" style="text-decoration: underline;">bergabung sekarang</a>
      </div>
    </div>

    <div class="container" id="panel" style="margin-bottom: 50px;">

      <div class="col-lg-12 col-sm-12 info-panel" style="padding-bottom: 50px;">
        <div class="row text-center">
          <div class="col-12 my-5">
            <h3>Kenapa Kami?</h3>
          </div>
          <div class="col-lg-4 col-xs-12 col-sm-12 col-md-12">
            <h3>Kota Terjangkau</h3>
            <i class="h1 fa fa-globe"></i>
            <h5><?=$daerah['kota']?></h5>
          </div>
          <div class="col-lg-4 col-xs-12 col-sm-12 col-md-12">
            <h3>Peternak</h3>
            <i class="h1 fa fa-users"></i>
            <h5><?=$peternak['peternak']?></h5>
          </div>
          <div class="col-lg-4 col-xs-12 col-sm-12 col-md-12">
            <h3>Produk</h3>
            <i class="h1 fas fa-horse"></i>
            <h5><?=$produk['produk']?></h5>
          </div>
        </div>
      </div>

    </div>
    <?php 
    include "../../templates/footer.php";
    include "../../partials/footer.php"; 
    ?>
  </body>
</html>