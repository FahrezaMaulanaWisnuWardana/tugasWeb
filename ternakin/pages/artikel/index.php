<?php 
  $title="Artikel";
  include"../../config/database.php";
  include"../../templates/header.php";
  $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
  $halaman_awal = ($halaman>1) ? ($halaman * 6) - 6 : 0;
  $previous = $halaman - 1;
  $next = $halaman + 1;

  $sqlArtikel = mysqli_query($con,"SELECT * FROM tb_artikel LIMIT $halaman_awal, 6");
  $jmlArtikel = mysqli_query($con,"SELECT * FROM tb_artikel");
  $jml = mysqli_num_rows($jmlArtikel);
  $total_halaman = ceil($jml/6);
  $nomor = $halaman_awal+1;
?>
<style type="text/css">
  .checked {
    color: orange;
  }
  .card-content{
    top:0;
    bottom:0;
    left:0;
    right:0;
  }
  .transition-3d-hover {
    transition: all 0.2s ease-in-out;
  }
  .transition-3d-hover:hover, .transition-3d-hover:focus {
    -webkit-transform: translateY(-3px);
    transform: translateY(-3px);
  }
  .gradient-overlay-half-dark::before {
    background-image: linear-gradient( 150deg, rgba(34, 48, 73, 0.675) 0%, rgba(119, 131, 143, 0.3) 100% );
    background-repeat: repeat-x;
    position: absolute;
    top: 0;
    left: 0;
    bottom: 0;
    right: 0;
    width: 100%;
    height: 100%;
    content: "";
  }
  .text-white-70{
    color: rgba(255, 255, 255, 0.7) !important; 
  }
  .overflow-hidden{
    overflow: hidden;
  }
  .height-380 {
    height: 23.75rem;
  }
</style>
  </head>
  <body>
    <?php 
      include"../../partials/navbar.php"; 
    ?>
    <div class="container my-5">
      <div class="row">
        <?php 
          while ($dataArtikel = mysqli_fetch_array($sqlArtikel)) {
            ?>
              <div class="col-12 col-lg-4 overflow-hidden my-2">
                <a href="<?=$_ENV['base_url']?>a/<?=$dataArtikel['slug']?>">
                  <div class="overflow-hidden rounded height-380 gradient-overlay-half-dark position-relative transition-3d-hover mx-auto" style="width: 350px;">
                      
                      <img src="<?=$_ENV['base_url']?>assets/image/artikel/<?=$dataArtikel['foto']?>" class="w-100 h-100 object-fit-cover">
                      <div class="position-absolute p-4 h-100 w-100 card-content">
                          <div class="position-relative h-100 w-100">
                            <header class="mb-3 text-right">
                                <small class="text-white-70"><?= strftime('%d %B %Y', strtotime($dataArtikel['created_at'])) ?></small>
                            </header>
                              <div class="position-absolute" style="bottom:0">
                                  <h2 class="h5 text-white"><?=$dataArtikel['judul']?></h2>
                                  <p class="text-white-70"><?= implode(' ', array_slice(explode(' ', strip_tags(preg_replace("/&#?[a-z0-9]+;/i", "", $dataArtikel['isi']))), 0, 12)) ?></p>
                              </div>
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
    <?php include"../../partials/footer.php"; ?>
  </body>
    <?php include"../../templates/footer.php"; ?>
</html>