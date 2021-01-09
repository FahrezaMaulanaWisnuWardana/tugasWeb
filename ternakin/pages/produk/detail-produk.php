<?php 
	$title="Situs jual beli hewan dan hasil hewan";
	include"../../config/database.php";
	$id = explode('-', $_GET['id']);
	$sqlDetail = mysqli_query($con,"SELECT * FROM tb_produk LEFT JOIN tb_produk_jenis ON tb_produk_jenis.id_jenis_produk = tb_produk.id_jenis_produk INNER JOIN tb_kota ON tb_produk.id_kota = tb_kota.id_kota INNER JOIN tb_provinsi ON tb_provinsi.id_provinsi = tb_produk.id_provinsi WHERE id_hewan='".end($id)."'");
	$sqlRating = mysqli_query($con , "SELECT AVG(rating) FROM tb_rating tr INNER JOIN tb_transaksi tt ON tr.kd_tr_peternak = tt.kd_tr_peternak INNER JOIN tb_produk tp ON tt.id_hewan = tp.id_hewan WHERE tp.id_hewan = '".end($id)."' ");
	$rating = mysqli_fetch_row($sqlRating);
	$dataHewan = mysqli_fetch_assoc($sqlDetail);
	$img = explode(',', $dataHewan['foto_produk']);
	$jmlImg = count($img);
	include"../../templates/header.php";
 ?>
 	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/zoomove/1.2.1/zoomove.min.css">
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
					  <figure class="zoo-item" data-zoo-image="<?=$_ENV['base_url']?>assets/image/produk/<?=$dataHewan['id_peternak'].'/'.$img[0]?>"></figure>
					</div>
					<div class="img-small-wrap">
						<div class="img-small-wrap">
						<?php 
							for ($i=0; $i < $jmlImg; $i++){
								?>
								  <div class="item-gallery">
								  	<img src="<?=$_ENV['base_url']?>assets/image/produk/<?=$dataHewan['id_peternak'].'/'.$img[$i]?>" class="item-img">
								  </div>
								<?php
							}
						?>
						</div>
					</div>
					</article>
				</aside>
				<aside class="col-sm-7">
					<article class="card-body p-5">
						<h3 class="title mb-3"><?=$dataHewan['nama_produk']?></h3>
						<p class="price-detail-wrap"> 
							<span class="price h3 text-warning"> 
								<span class="currency">Rp.</span><span class="num"><?=number_format($dataHewan['harga'],2,',','.') ?></span>
							</span> 
						</p> <!-- price-detail-wrap .// -->
					<dl class="item-property">
					  <dt>Deskripsi</dt>
					  <dd><p><?=$dataHewan['deskripsi']?></p></dd>
					</dl>
					<dl class="param param-feature">
					  <dt>Tipe</dt>
					  <dd><?=$dataHewan['nama_jenis_produk']?></dd>
					</dl>  <!-- item-property-hor .// -->
					<dl class="param param-feature">
					  <dt>Daerah</dt>
					  <dd><?=$dataHewan['nama_kota'].' - '.$dataHewan['nama_provinsi']?></dd>
					</dl>  <!-- item-property-hor .// -->
					<hr>
						<div class="row">
							<div class="col-sm-5">
								<dl class="param param-inline">
								  <dt>Quantity: </dt>
								  <dd><?=$dataHewan['jumlah']?></dd>
								</dl>
							</div>
							<div class="col-sm-5">
								<dl class="param param-inline">
								  <dt>Rating</dt>
								  <dd><?=($rating[0]!==NULL)?round($rating[0],2):'0';?>/5</dd>
								</dl>
							</div>
						</div>
						<hr>
						<button class="btn btn-lg btn-outline-primary text-uppercase <?=($dataHewan['id_peternak']==$_SESSION['user']['id'])?'':'cart'?>" data-id="<?=$dataHewan['id_hewan']?>" data-penjual="<?=$dataHewan['id_peternak']?>" data-harga="<?=$dataHewan['harga']?>"> <i class="fas fa-shopping-cart"></i> Tambah ke keranjang </button>
					</article> <!-- card-body.// -->
				</aside> <!-- col.// -->
			</div> <!-- row.// -->
		</div> <!-- card.// -->
	</div>
    <?php include"../../partials/footer.php"; ?>
  </body>
    <?php include"../../templates/footer.php"; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/zoomove/1.2.1/zoomove.min.js"></script>
    <script type="text/javascript">
    	$(document).ready(function(){
 			$('.zoo-item').ZooMove();
 			$(".item-img").on('click',function(){
 				$('figure').attr('data-zoo-image',$(this).attr('src'))
 				$('.zoo-img').css('background-image','url('+$(this).attr('src')+')')
 			})
    	})
    </script>
</html>