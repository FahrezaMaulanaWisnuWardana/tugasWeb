<?php 
	$title="Situs jual beli hewan dan hasil hewan";
	include"../../config/database.php";
	include"../../templates/header.php";
 ?>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 	<link rel="stylesheet" type="text/css" href="<?=$_ENV['base_url']?>assets/css/detail-produk.css">
  </head>
  <body>
    <?php 
      include"../../partials/navbar.php"; 
    ?>
    <div class="container my-5">
		<div class="card">
			<div class="row">
				<aside class="col-sm-5 border-right">
					<article class="gallery-wrap"> 
					<div class="img-big-wrap">
						<div> <a href="#"><img src="<?=$_ENV['base_url']?>assets/image/produk/1-min.png"></a></div>
					</div>
					<div class="img-small-wrap">
						<div class="img-small-wrap">
						<div class="item-gallery"> <img src="<?=$_ENV['base_url']?>assets/image/produk/1-min.png"> </div>
						<div class="item-gallery"> <img src="<?=$_ENV['base_url']?>assets/image/produk/1-min.png"> </div>
						<div class="item-gallery"> <img src="<?=$_ENV['base_url']?>assets/image/produk/1-min.png"> </div>
						<div class="item-gallery"> <img src="<?=$_ENV['base_url']?>assets/image/produk/1-min.png"> </div>
						</div>
					</div>
					</article>
				</aside>
				<aside class="col-sm-7">
					<article class="card-body p-5">
						<h3 class="title mb-3">sapi</h3>
						<p class="price-detail-wrap"> 
							<span class="price h3 text-warning"> 
								<span class="currency">Rp.</span><span class="num">400.000,00</span>
							</span> 
						</p> <!-- price-detail-wrap .// -->
					<dl class="item-property">
					  <dt>Deskripsi</dt>
					  <dd><p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Deserunt, obcaecati.</p></dd>
					</dl>
					<dl class="param param-feature">
					  <dt>Tipe</dt>
					  <dd>kambing</dd>
					</dl>  <!-- item-property-hor .// -->
					<dl class="param param-feature">
					  <dt>Daerah</dt>
					  <dd>RIAU - KOTA PEKANBARU</dd>
					</dl>  <!-- item-property-hor .// -->
					<hr>
						<div class="row">
							<div class="col-sm-5">
								<dl class="param param-inline">
								  <dt>Quantity: </dt>
								  <dd>4</dd>
								</dl>
							</div>
							<div class="col-sm-7">
								<dl class="param param-inline">
								  <dt>Rating</dt>
								  <dd>4/5</dd>
								</dl>
							</div>
						</div>
						<hr>
						<button class="btn btn-lg btn-outline-primary text-uppercase"> <i class="fas fa-shopping-cart"></i> Tambah ke keranjang </button>
					</article> <!-- card-body.// -->
				</aside> <!-- col.// -->
			</div> <!-- row.// -->
		</div> <!-- card.// -->
	</div>
    <?php include"../../partials/footer.php"; ?>
  </body>
    <?php include"../../templates/footer.php"; ?>
</html>