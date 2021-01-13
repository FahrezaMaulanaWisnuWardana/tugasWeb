<?php 
  $dataSlide = explode(',', $dataCarousel['img_carousel']);
  $dataSlideJudul = explode('|', $dataCarousel['judul']);
  $dataSlideSubJudul = explode('|', $dataCarousel['sub_judul']);
  $dataSlideDeskripsi = explode('|', $dataCarousel['deskripsi']);
  $dataSlideLink = explode('|', $dataCarousel['url']);
?>
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
      <div class="carousel-inner position-relative overflow-hidden carousel-height">
        <div class="carousel-item active">
          <div class="desc position-absolute text-white">
            <div class="h4">
              <?=$dataSlideJudul[0]?>
            </div>
            <div class="h3">
              <?=$dataSlideSubJudul[0]?>
            </div>
            <div class="p">
              <?=$dataSlideDeskripsi[0]?>
            </div>
            <a href="<?=$_ENV['base_url'].$dataSlideLink[0]?>" class="btn btn-success my-2">
              Belanja Sekarang <i class="fas fa-chevron-right"></i>
            </a>
          </div>
          <img src="<?=$_ENV['base_url']?>assets/image/slider/<?=$dataSlide[0]?>" class="d-block w-100">
        </div>
        <div class="carousel-item">
          <div class="desc position-absolute text-white">
            <div class="h4">
              <?=$dataSlideJudul[1]?>
            </div>
            <div class="h3">
              <?=$dataSlideSubJudul[1]?>
            </div>
            <div class="p">
              <?=$dataSlideDeskripsi[1]?>
            </div>
            <a href="<?=$_ENV['base_url'].$dataSlideLink[1]?>" class="btn btn-success my-2">
              Belanja Sekarang <i class="fas fa-chevron-right"></i>
            </a>
          </div>
          <img src="<?=$_ENV['base_url']?>assets/image/slider/<?=$dataSlide[1]?>" class="d-block w-100">
        </div>
        <div class="carousel-item">
          <div class="desc position-absolute text-white">
            <div class="h4">
              <?=$dataSlideJudul[2]?>
            </div>
            <div class="h3">
              <?=$dataSlideSubJudul[2]?>
            </div>
            <div class="p">
              <?=$dataSlideDeskripsi[2]?>
            </div>
            <a href="<?=$_ENV['base_url'].$dataSlideLink[2]?>" class="btn btn-success my-2">
              Belanja Sekarang <i class="fas fa-chevron-right"></i>
            </a>
          </div>
          <img src="<?=$_ENV['base_url']?>assets/image/slider/<?=$dataSlide[2]?>" class="d-block w-100">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>