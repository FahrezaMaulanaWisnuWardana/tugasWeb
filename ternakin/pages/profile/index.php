<?php 
  require_once"../../config/database.php";
  $title="Profile | ".$_SESSION['user']['nama'];
  require_once"../../templates/header.php";
  $sql = mysqli_query($con,"SELECT id_peternak , nama_lengkap , email , no_hp , alamat , no_rek , id_provinsi , id_kota , level FROM tb_peternak WHERE id_peternak='".$_SESSION['user']['id']."'");
  $data = mysqli_fetch_assoc($sql);
  if ($data['id_provinsi']!=null && $data['id_kota']!=null) {
	  $sqlProvinsi = mysqli_query($con,"SELECT * FROM tb_provinsi WHERE id_provinsi='".$data['id_provinsi']."'");
	  $dataProv = mysqli_fetch_assoc($sqlProvinsi);
	  $sqlKota = mysqli_query($con,"SELECT * FROM tb_kota WHERE id_kota='".$data['id_kota']."'");
	  $dataKota = mysqli_fetch_assoc($sqlKota);
  }
  $sqlTransku = mysqli_query($con,"SELECT * FROM tb_transaksi tt 
  	LEFT JOIN tb_produk tp ON tt.id_hewan = tp.id_hewan 
  	LEFT JOIN tb_peternak tk ON tk.id_peternak = tp.id_peternak WHERE tt.id_peternak='".$_SESSION['user']['id']."'") OR die(mysqli_error($con));
  $sqlTrans = mysqli_query($con,"SELECT * FROM tb_transaksi tt 
  	LEFT JOIN tb_produk tp ON tt.id_hewan = tp.id_hewan 
  	LEFT JOIN tb_peternak tk ON tk.id_peternak = tp.id_peternak WHERE tk.id_peternak='".$_SESSION['user']['id']."'") OR die(mysqli_error($con));
  $sqlBukti = mysqli_query($con,"SELECT * FROM tb_bukti_tf");
 ?>
 <style type="text/css">
 	.card-profile{
 		margin-top: -120px;
 	}
 </style>
</head>
<body>
<?php require_once"../../partials/navbar-profile.php"; ?>
<div class="container" style="margin: 100px auto;">
	<div class="jumbotron">
		<div class="d-flex justify-content-between">
			<div class="card card-profile" style="width: 120px;background: #f2f2f2;">
				<img src="https://i.pinimg.com/originals/0c/3b/3a/0c3b3adb1a7530892e55ef36d3be6cb8.png" style="width: 100%;">
			</div>
			<div class="card-profile d-flex align-items-center">
				<a href="<?=$_ENV['base_url']?>edit-profile" class="btn btn-success">Edit Profile</a>
			</div>
		</div>
		<ul class="list-group list-group-flush mt-2">
		  <li class="list-group-item">Nama: <?=$data['nama_lengkap']?></li>
		  <li class="list-group-item">Email: <?=$data['email']?></li>
		  <li class="list-group-item">No Hp: <?=$data['no_hp']?></li>
		  <li class="list-group-item"><?=($data['id_provinsi']==null && $data['alamat']==null && $data['id_kota']==null)?'-':'Provinsi: '.$dataProv['nama_provinsi'].' <br> Kota : '.$dataKota['nama_kota'].' <br> Alamat: '.$data['alamat']?></li>
		</ul>
	</div>
        <?php 
          if (isset($_SESSION['alert'])) {
            if (isset($_SESSION['alert']['berhasil'])) {
              ?>
              <div class="alert alert-success" role="alert">
                <?=$_SESSION['alert']['berhasil']?>
              </div>
              <?php
            }else{
              ?>
              <div class="alert alert-danger text-center" role="alert">
                <?=$_SESSION['alert']['gagal']?>
              </div>
              <?php
            }
            unset($_SESSION['alert']);
          }
        ?>
		<!-- Tabs -->
		<ul class="nav nav-tabs mt-4" id="myTab" role="tablist">
		  <li class="nav-item">
		    <a class="nav-link" id="history-transaksi-tab" data-toggle="tab" href="#history-transaksi" role="tab" aria-controls="history-transaksi" aria-selected="false">Data Transaksiku</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" id="penjual-tab" data-toggle="tab" href="#penjual" role="tab" aria-controls="penjual" aria-selected="false">Data Produk</a>
		  </li>
		  <?php if ($data['level']==2): ?>
			  <li class="nav-item">
			    <a class="nav-link" id="check-transaksi-tab" data-toggle="tab" href="#check-transaksi" role="tab" aria-controls="check-transaksi" aria-selected="false">Transaksi Produk</a>
			  </li>
		  <?php endif ?>
		</ul>
		<div class="tab-content" id="myTabContent">
		  <div class="tab-pane fade" id="history-transaksi" role="tabpanel" aria-labelledby="history-transaksi-tab">
		  	<div class="table-responsive">
		  		<table class="table">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Nama Produk</th>
				      <th scope="col">Harga</th>
				      <th scope="col">Kurir</th>
				      <th scope="col">No Resi</th>
				      <th scope="col">Status</th>
				      <th scope="col">Upload Bukti Transaksi</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php 
				  		$no = 0;
				  		while ($dataTransku = mysqli_fetch_array($sqlTransku)) {
				  			?>
				  			<tr>
				  				<td><?=$no++?></td>
				  				<td><?=$dataTransku['nama_produk']?></td>
				  				<td><?=number_format($dataTransku['harga'],2,',','.')?></td>
				  				<td><?=$dataTransku['kurir']?></td>
				  				<td><?=$dataTransku['no_resi']?></td>
				  				<td>
				  				<?php if ($dataTransku['status']===1) {
				  						echo "Silahkan upload bukti pembayaran";
				  					}else if($dataTransku['status']===2){
				  						echo "Pesanan sedang disiapkan";
				  					}else if($dataTransku['status']===3){
				  						echo "Pesanan sedang dikirim";
				  					}else if($dataTransku['status']===4){
				  						echo "Pesanan telah sampai";
				  					} ?>
				  				</td>
				  				<td>
				  					<?php while ($dataBukti = mysqli_fetch_array($sqlBukti)) {
				  						if ($dataBukti['id_transaksi'] == $dataTransku['id_transaksi']){
				  							?>
				  							<h1><i class="fas fa-check"></i></h1>
				  							<?php
				  						}else{
				  						?>
				  						ok
				  						<?php }} ?>
				  				</td>
				  			</tr>
				  			<?php
				  		}
				  	 ?>
				  </tbody>
				</table>
		  	</div>
		  </div>
		  <div class="tab-pane fade" id="penjual" role="tabpanel" aria-labelledby="penjual-tab">
		  	<?php 
		  		if ($data['level']==1) {
		  			?>
		  			<div class="text-center mt-5">
		  				<form method="POST" action="<?=$_ENV['base_url']?>pages/profile/aksi.php">
		  					<button type="submit" name="aksi" value="gabung" class="btn btn-success">Gabung Menjadi Penjual</button>
		  				</form>
		  			</div>
		  			<?php
		  		}else{
		  			echo"data peternak";
		  		}
		  	 ?>
		  </div>
		  <?php if ($data['level']==2): ?>
			  <div class="tab-pane fade" id="check-transaksi" role="tabpanel" aria-labelledby="check-transaksi-tab">
			  	<div class="table-responsive">
			  		<table class="table">
					  <thead>
					    <tr>
					      <th scope="col">#</th>
					      <th scope="col">Nama Produk</th>
					      <th scope="col">Harga</th>
					      <th scope="col">Kurir</th>
					      <th scope="col">No Resi</th>
					      <th scope="col">Status</th>
					      <th scope="col">Bukti Transaksi</th>
					    </tr>
					  </thead>
					  <tbody>
					  	<?php 
					  		$no = 0;
					  		while ($dataTrans = mysqli_fetch_array($sqlTrans)) {
					  			?>
					  			<tr>
					  				<td><?=$no++?></td>
					  				<td><?=$dataTrans['nama_produk']?></td>
					  				<td><?=number_format($dataTrans['harga'],2,',','.')?></td>
					  				<td><?=$dataTrans['kurir']?></td>
					  				<td><?=$dataTrans['no_resi']?></td>
					  				<td>
					  					<form method="POST">
							  				<?php if ($dataTransku['status']===1) {
							  					?>
						  						<button type="submit" class="btn btn-success" name="aksi" value="udpate-status">Proses Transaksi</button>
						  						<input type="hidden" name="status" value="1">
						  						<input type="hidden" name="id" value="<?=$dataTrans['id_transaksi']?>">
						  						<small class="text-danger">Silahkan cek Bukti pembayaran terlebih dahulu</small>
						  						<small class="text-danger">Silahkan tekan tombol jika pembayaran telah tervalidasi</small>
							  					<?php
							  					}else if($dataTransku['status']===2){
							  					?>
						  						<button type="submit" class="btn btn-success" name="aksi" value="udpate-status">Siapkan Barang</button>
						  						<input type="hidden" name="status" value="2">
						  						<input type="hidden" name="id" value="<?=$dataTrans['id_transaksi']?>">
						  						<small class="text-danger">Silahkan cek Bukti pembayaran terlebih dahulu</small>
						  						<small class="text-danger">Silahkan tekan tombol jika pembayaran telah tervalidasi</small>
							  					<?php
							  					}else if($dataTransku['status']===3){
							  					?>
							  					<?php
							  					}else if($dataTransku['status']===4){
							  					?>
							  					<?php
							  					} ?>
					  					</form>
					  				</td>
					  				<td>
					  					<a href="#">check bukti</a>
					  				</td>
					  			</tr>
					  			<?php
					  		}
					  	 ?>
					  </tbody>
					</table>
			  	</div>
			  </div>
		  <?php endif ?>
		</div>
		<!-- End Tabs -->
</div>
    <?php include"../../partials/footer.php"; ?>
  </body>
    <?php include"../../templates/footer.php"; ?>
</html>