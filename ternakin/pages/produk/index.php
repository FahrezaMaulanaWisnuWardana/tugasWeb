<?php 
  $title="Situs jual beli hewan dan hasil hewan";
  include"config/database.php";
  include"templates/header.php";
  $sqlCarousel = mysqli_query($con,"SELECT * FROM tb_carousel");
  $dataCarousel = mysqli_fetch_assoc($sqlCarousel);
?>
<style type="text/css">
  .checked {
    color: orange;
  }
</style>
  </head>
  <body>
    <?php 
      include"partials/navbar.php"; 
      include"partials/carousel.php"; 
    ?>
    <div class="container-fluid">

      <div class="col-lg-9 info-panel">
        <div class="row text-center">
          <div class="col-lg">
            <img src="https://png.pngtree.com/png-vector/20190214/ourmid/pngtree-cow-silhouette-vector-icon--black-angus-vector-illustration-png-image_434156.jpg" style="width: 150px;">
            <div class="h5 pb-5">
              Hewan Ternak
            </div>
          </div>
          <div class="col-lg">
            <img src="https://png.pngtree.com/png-vector/20190214/ourmid/pngtree-cow-silhouette-vector-icon--black-angus-vector-illustration-png-image_434156.jpg" style="width: 150px;">
            <div class="h5 pb-5">
              Pakan Ternak
            </div>
          </div>
          <div class="col-lg">
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
        <div class="col-3 my-1">
          <div class="card overflow-hidden">
            <div class="text-center">
              <img src="https://png.pngtree.com/png-vector/20190214/ourmid/pngtree-cow-silhouette-vector-icon--black-angus-vector-illustration-png-image_434156.jpg" class="card-img-top" style="width:200px;">
            </div>
            <div class="card-body">
              <small class="card-text"><span class="badge badge-secondary">Sapi</span><span class="badge badge-secondary">Hewan ternak</span></small>
              <h5 class="card-title">Sapi Gahar Cak Wang</h5>
              <div class="info-card pb-2">
                <span class="text-primary font-weight-bold d-inline">Rp.15.000.000</span>
                <div class="rating float-right">
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                </div>
              </div>
            </div>
<!--             <div class="card-body-hidden">
              <a href="#" class="btn border btn-sm mb-2"><i class="bx bxs-cart icon-single"></i> Tambahkan ke keranjang</a>
              <div class="text-center">
                <a class="nav-link-style font-size-ms" href="#quick-view" data-toggle="modal"><i class="bx bxs-book-open mr-1"></i>Quick view</a>
              </div>
            </div> -->
          </div>
        </div>

        <div class="w-100 text-center my-4">
          <a href="#" class="btn btn-success">Semua Produk <i class="fas fa-chevron-right"></i></a>
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

        <div class="col-3 col-custom-card my-1">
          
          <div class="card" style="height: 200px;">
              <div class="text-center">
                <img src="https://png.pngtree.com/png-vector/20190214/ourmid/pngtree-cow-silhouette-vector-icon--black-angus-vector-illustration-png-image_434156.jpg" style="width:200px; z-index: -1">
              </div>
              <div class="custom-card">
                <div class="card-title-custom text-center">
                  <h4>Sapi</h4>
                </div>
            </div>
          </div>

        </div>
        <div class="col-3 col-custom-card my-1">
          
          <div class="card" style="height: 200px;">
              <div class="text-center">
                <img src="https://png.pngtree.com/png-vector/20190214/ourmid/pngtree-cow-silhouette-vector-icon--black-angus-vector-illustration-png-image_434156.jpg" style="width:200px; z-index: -1">
              </div>
              <div class="custom-card">
                <div class="card-title-custom text-center">
                  <h4>Sapi</h4>
                </div>
            </div>
          </div>

        </div>
        <div class="col-3 col-custom-card my-1">
          
          <div class="card" style="height: 200px;">
              <div class="text-center">
                <img src="https://png.pngtree.com/png-vector/20190214/ourmid/pngtree-cow-silhouette-vector-icon--black-angus-vector-illustration-png-image_434156.jpg" style="width:200px; z-index: -1">
              </div>
              <div class="custom-card">
                <div class="card-title-custom text-center">
                  <h4>Sapi</h4>
                </div>
            </div>
          </div>

        </div>
        <div class="col-3 col-custom-card my-1">
          
          <div class="card" style="height: 200px;">
              <div class="text-center">
                <img src="https://png.pngtree.com/png-vector/20190214/ourmid/pngtree-cow-silhouette-vector-icon--black-angus-vector-illustration-png-image_434156.jpg" style="width:200px; z-index: -1">
              </div>
              <div class="custom-card">
                <div class="card-title-custom text-center">
                  <h4>Sapi</h4>
                </div>
            </div>
          </div>

        </div>
        <div class="col-3 col-custom-card my-1">
          
          <div class="card" style="height: 200px;">
              <div class="text-center">
                <img src="https://png.pngtree.com/png-vector/20190214/ourmid/pngtree-cow-silhouette-vector-icon--black-angus-vector-illustration-png-image_434156.jpg" style="width:200px; z-index: -1">
              </div>
              <div class="custom-card">
                <div class="card-title-custom text-center">
                  <h4>Sapi</h4>
                </div>
            </div>
          </div>

        </div>
        <div class="col-3 col-custom-card my-1">
          
          <div class="card" style="height: 200px;">
              <div class="text-center">
                <img src="https://png.pngtree.com/png-vector/20190214/ourmid/pngtree-cow-silhouette-vector-icon--black-angus-vector-illustration-png-image_434156.jpg" style="width:200px; z-index: -1">
              </div>
              <div class="custom-card">
                <div class="card-title-custom text-center">
                  <h4>Sapi</h4>
                </div>
            </div>
          </div>

        </div>
        <div class="col-3 col-custom-card my-1">
          
          <div class="card" style="height: 200px;">
              <div class="text-center">
                <img src="https://png.pngtree.com/png-vector/20190214/ourmid/pngtree-cow-silhouette-vector-icon--black-angus-vector-illustration-png-image_434156.jpg" style="width:200px; z-index: -1">
              </div>
              <div class="custom-card">
                <div class="card-title-custom text-center">
                  <h4>Sapi</h4>
                </div>
            </div>
          </div>

        </div>
        <div class="col-3 col-custom-card my-1">
          
          <div class="card" style="height: 200px;">
              <div class="text-center">
                <img src="https://png.pngtree.com/png-vector/20190214/ourmid/pngtree-cow-silhouette-vector-icon--black-angus-vector-illustration-png-image_434156.jpg" style="width:200px; z-index: -1">
              </div>
              <div class="custom-card">
                <div class="card-title-custom text-center">
                  <h4>Sapi</h4>
                </div>
              </div>
          </div>

        </div>

        <div class="w-100 text-center my-4">
          <a href="#" class="btn btn-success">Semua Kategori <i class="fas fa-chevron-right"></i></a>
        </div>

      </div>

    </div>
    <div class="blog-info-container text-center">
      <h1><i class="fas fa-edit"></i></h1>
      <h3>Yuk baca artikel ternakin</h3>
      <p class="text-muted">Artikel terbaru seputar peternakan</p>
    </div>
    <footer class="py-5" style="background: rgba(0, 184, 148,1.0);">
      <div class="container">
        <div class="row d-flex align-items-center">
          <div class="col-lg-4" style="color: #dfe6e9">
            <h3>Ternakin</h3>
            <ul class="font-weight-bold">
              <li>ternakin</li>
              <li>ternakin</li>
              <li>ternakin</li>
              <li>ternakin</li>
              <li>ternakin</li>
            </ul>
          </div>
          <div class="col-lg-4" style="color: #dfe6e9">
            <h3>Kontak</h3>
            <ul class="font-weight-bold">
              <li>ternakin</li>
              <li>ternakin</li>
              <li>ternakin</li>
              <li>ternakin</li>
              <li>ternakin</li>
            </ul>
          </div>
          <div class="col-lg-4">
            <h1 class="text-center" style="color: #dfe6e9">LOGO</h1>
          </div>
        </div>
      </div>
    </footer>
  </body>
    <?php include"templates/footer.php"; ?>
</html>