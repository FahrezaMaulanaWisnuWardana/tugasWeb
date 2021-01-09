<?php 
  require_once"../../config/database.php";
  $title="Profile | ".$_SESSION['user']['nama'];
  require_once"../../templates/header.php";
  $sql = mysqli_query($con,"SELECT id_peternak , img_profile , nama_lengkap , email , no_hp , alamat , no_rek , id_provinsi , id_kota , level FROM tb_peternak WHERE id_peternak='".$_SESSION['user']['id']."'");
  $data = mysqli_fetch_assoc($sql);
  if ($data['id_provinsi']!=null && $data['id_kota']!=null) {
	  $sqlProvinsi = mysqli_query($con,"SELECT * FROM tb_provinsi WHERE id_provinsi='".$data['id_provinsi']."'");
	  $dataProv = mysqli_fetch_assoc($sqlProvinsi);
	  $sqlKota = mysqli_query($con,"SELECT * FROM tb_kota WHERE id_kota='".$data['id_kota']."'");
	  $dataKota = mysqli_fetch_assoc($sqlKota);
  }
  $sqlProdukku = mysqli_query($con,"SELECT * FROM tb_produk WHERE id_peternak='".$_SESSION['user']['id']."'");
  $sqlTransku = mysqli_query($con,"SELECT tt.kd_transaksi , tt.kd_tr_peternak , tt.id_hewan , COUNT(tt.kd_transaksi) as jumlah , tt.kurir , tt.no_resi , tt.status , tk.no_rek , SUM(tp.harga) as harga 
  	  FROM tb_transaksi tt 
  	  LEFT JOIN tb_produk tp ON tt.id_hewan = tp.id_hewan 
  	  LEFT JOIN tb_peternak tk ON tk.id_peternak = tp.id_peternak 
  	  WHERE tt.id_peternak='".$_SESSION['user']['id']."' GROUP BY tt.kd_tr_peternak") OR die(mysqli_error($con));
  $sqlTrans = mysqli_query($con,"SELECT  tt.kd_transaksi , tt.kd_tr_peternak , COUNT(tt.kd_transaksi) as jumlah , tt.id_peternak AS pembeli , tt.kurir , tt.no_resi , tt.status , SUM(tp.harga) as harga FROM tb_transaksi tt 
  	LEFT JOIN tb_produk tp ON tt.id_hewan = tp.id_hewan 
  	LEFT JOIN tb_peternak tk ON tk.id_peternak = tp.id_peternak WHERE tk.id_peternak='".$_SESSION['user']['id']."' GROUP BY tt.kd_tr_peternak") OR die(mysqli_error($con));
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
				<img src="<?=is_null($data['img_profile'])?'https://i.pinimg.com/originals/0c/3b/3a/0c3b3adb1a7530892e55ef36d3be6cb8.png':$_ENV['base_url'].'assets/profile/'.$data['id_peternak'].'/'.$_data['img_profile'];?>" style="width: 100%;">
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
				      <th scope="col">Kode Transaksi</th>
					  <th scope="col">No Rek</th>
				      <th scope="col">Kurir</th>
				      <th scope="col">No Resi</th>
				      <th scope="col">Harga</th>
				      <th scope="col">Status</th>
				      <th scope="col">Upload Bukti Transaksi</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php 
				  		$no = 1;
				  		while ($dataTransku = mysqli_fetch_array($sqlTransku)) {
				  			?>
				  			<tr>
				  				<td><?=$no++?></td>
				  				<td><?=$dataTransku['kd_transaksi'].'('.$dataTransku['jumlah'].' Produk)'?></td>
				  				<td class="text-center">
				  					<?=$dataTransku['no_rek'];?>
				  					<small class="d-block text-danger">Bayar Ke nomor rekening ini</small>
				  				</td>
				  				<td class="text-secondary"><?=is_null($dataTransku['kurir'])?'Kosong':$dataTransku['kurir'];?></td>
				  				<td class="text-secondary"><?=is_null($dataTransku['no_resi'])?'Kosong':$dataTransku['no_resi'];?></td>
				  				<td><?='Rp. '.number_format($dataTransku['harga'],2,',','.')?></td>
				  				<td class="text-center">
				  				<?php if ($dataTransku['status']==="1") {
				  						echo "Silahkan upload bukti pembayaran";
				  					}else if($dataTransku['status']==="2"){
				  						echo "Pesanan sedang disiapkan";
				  					}else if($dataTransku['status']==="3"){
				  						echo "Barang telah siap";
				  					}else if($dataTransku['status']==="4"){
				  						echo "Pesanan sedang dikirim";
				  						?>
				  						<small class="d-block mb-1 text-danger">Tekan tombol jika pesanan telah sampai</small>
			  							<form method="POST" action="<?=$_ENV['base_url']?>pages/profile/aksi">
					  						<button type="submit" class="btn btn-success" name="aksi" value="update-status">Barang telah sampai</button>
					  						<input type="hidden" name="status" value="5">
					  						<input type="hidden" name="id" value="<?=$dataTransku['kd_tr_peternak']?>">
			  							</form>
				  						<?php
				  					}else if($dataTransku['status']=="5"){
				  						echo"Pesanan telah sampai<br>";
				  						?>
				  						<span class="rating" data-tr="<?=$dataTransku['kd_tr_peternak']?>" style="cursor: pointer;">beri rating</span>
				  						<?php
				  					}else if($dataTransku['status']=="6"){
				  						echo"Pesanan telah sampai";
				  					}else if($dataTransku['status']==="99"){
				  						echo "Silahkan tunggu verifikasi dari penjual";
				  					} ?>
				  				</td>
				  				<td class="text-center">
				  					<?php if ($dataTransku['status']==="1") {
				  						?>
				  						<input type="file" name="bukti_tf" class="form-control-files bukti" accept="image/*">
				  						<input type="hidden" class="kd_transaksi" value="<?=$dataTransku['kd_tr_peternak']?>">
				  						<?php
				  					}else{
				  						?>
				  						<i class="bx bx-check text-success" style="font-size: 2em;"></i>
				  						<?php
				  					} ?>
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
		  			?>
	  				<div class="table-responsive">
				  		<table class="table">
						  <thead>
						    <tr>
						      <th scope="col">Nama Produk</th>
						      <th scope="col">Jumlah</th>
						      <th scope="col">Harga</th>
						      <th scope="col">Aksi</th>
						    </tr>
						  </thead>
						  <tbody>
				  			<?php
				  			while ($produk = mysqli_fetch_array($sqlProdukku)) {
				  				?>
				  				<tr>
				  					<td>
				  						<a href="<?=$_ENV['base_url']?>p/<?=str_replace(' ','-',$produk['nama_produk']).'-'.$produk['id_hewan']?>">
					  						<?=$produk['nama_produk']?></td>
					  					</a>
				  					<td><?=$produk['jumlah']?></td>
				  					<td>Rp.<?=number_format($produk['harga'],2,',','.')?></td>
				  					<td class="text-center">
				  						<form method="POST" action="<?=$_ENV['base_url']?>pages/profile/aksi">
				  							<button type="submit" name="aksi" class="btn btn-danger" value="hapus-produk">
				  								<i class="fas fa-trash"></i>
				  								<input type="hidden" name="id" value="<?=$produk['id_hewan']?>">
				  							</button>
				  							<a href="<?=$_ENV['base_url']?>edit-produk/<?=$produk['id_hewan']?>" class="btn btn-success"><i class="fas fa-pen"></i></a>
				  						</form>
				  					</td>
				  				</tr>
				  				<?php
				  			}
				  			?>
						  </tbody>
						</table>
					</div>
		  			<?php
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
					      <th scope="col">Kode Produk</th>
					      <th scope="col">Harga</th>
					      <th scope="col">Kurir</th>
					      <th scope="col">No Resi</th>
					      <th scope="col" class="text-center">Status</th>
					      <th scope="col">Bukti Transaksi</th>
					    </tr>
					  </thead>
					  <tbody>
					  	<?php 
					  		$no = 1;
					  		while ($dataTrans = mysqli_fetch_array($sqlTrans)) {
					  			?>
					  			<tr>
					  				<td><?=$no++?></td>
					  				<td class="alamat" data-id="<?=$dataTrans['pembeli']?>"><?=$dataTrans['kd_transaksi'].'('.$dataTrans['jumlah'].')'?></td>
					  				<td><?=number_format($dataTrans['harga'],2,',','.')?></td>
					  				<td><?=($dataTrans['status']==="1")?'':is_null($dataTrans['kurir'])?'<a class="reku" data-kd="'.$dataTrans['kd_tr_peternak'].'">Kosong</a>':$dataTrans['kurir'];?></td>
					  				<td><?=($dataTrans['status']==="1")?'':is_null($dataTrans['no_resi'])?'<a class="reku" data-kd="'.$dataTrans['kd_tr_peternak'].'">Kosong</a>':$dataTrans['no_resi'];?></td>
					  				<td class="text-center">
					  				<?php if ($dataTrans['status']==="1") {
					  					?>
					  					<h5>Hai ada pesanan</h5>
					  					<h6>Pastikan anda cek pembayaran dengan benar!</h6>
					  					<small class="text-danger">Semua resiko sepenuhnya ditanggung penjual</small>
					  					<?php
					  					}else if($dataTrans['status']==="2"){
					  					?>
			  							<form method="POST" action="<?=$_ENV['base_url']?>pages/profile/aksi">
					  						<button type="submit" class="btn btn-success" name="aksi" value="update-status">Siapkan Barang</button>
					  						<input type="hidden" name="status" value="3">
					  						<input type="hidden" name="id" value="<?=$dataTrans['kd_tr_peternak']?>">
			  							</form>
					  					<?php
					  					}else if($dataTrans['status']==="3"){
					  					?>
			  							<form method="POST" action="<?=$_ENV['base_url']?>pages/profile/aksi">
					  						<button type="submit" class="btn btn-success" name="aksi" value="update-status">Kirim Barang</button>
					  						<input type="hidden" name="status" value="4">
					  						<input type="hidden" name="id" value="<?=$dataTrans['kd_tr_peternak']?>">
					  					</form>
					  						<small class="text-danger">Silahkan cek Bukti pembayaran terlebih dahulu</small>
					  						<small class="text-danger">Silahkan tekan tombol jika pembayaran telah tervalidasi</small>
					  					<?php
					  					}else if($dataTrans['status']==="4"){
					  					?>
					  						<h5>Status pesanan sedang dikirim</h5>
					  					<?php
					  					}else if($dataTrans['status']==="5"){
					  					?>
					  						<h5>Selamat pesanan anda telah sampai</h5>
					  					<?php
					  					}else if($dataTrans['status']==="6"){
					  					?>
					  						<h5>Selamat pesanan anda telah sampai</h5>
					  					<?php
					  					}else if($dataTrans['status']==="99"){
				  						?>
			  							<form method="POST" action="<?=$_ENV['base_url']?>pages/profile/aksi">
					  						<button type="submit" class="btn btn-success mb-1" name="aksi" value="update-status">Validasi Pembayaran</button>
					  						<input type="hidden" name="status" value="2">
					  						<input type="hidden" name="id" value="<?=$dataTrans['kd_tr_peternak']?>">
					  					</form>
			  							<form method="POST" action="<?=$_ENV['base_url']?>pages/profile/aksi">
					  						<button type="submit" class="btn btn-danger mb-1" name="aksi" value="update-status">Bukti tidak valid</button>
					  						<input type="hidden" name="status" value="1">
					  						<input type="hidden" name="id" value="<?=$dataTrans['kd_tr_peternak']?>">
					  					</form>
				  						<small class="d-block text-danger">Silahkan cek Bukti pembayaran terlebih dahulu</small>
				  						<small class="d-block text-danger">Silahkan tekan tombol jika pembayaran telah tervalidasi</small>
				  						<small class="d-block text-danger">*Resiko Sepenuhnya ditanggung oleh penjual*</small>
				  						<?php
					  				}?>
					  				</td>
					  				<td>
					  					<a class="check" data-kd="<?=$dataTrans['kd_tr_peternak']?>" data-b="<?=$dataTrans['pembeli']?>">Cek Bukti</a>
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

		<!-- Modal -->
		<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Bukti Transfer</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-primary" id="simpan">Simpan data</button>
		      </div>
		    </div>
		  </div>
		</div>
		<!-- cek bukti tf -->
		<div class="modal fade" id="check-modal" tabindex="-1" role="dialog" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Bukti Transfer</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body check-modal">
		        
		      </div>
		    </div>
		  </div>
		</div>
		<!-- Update resi dan kurir -->
		<div class="modal fade" id="resi-kurir" tabindex="-1" role="dialog" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Update Resi dan Kurir</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <div class="form-group">
		        	<input type="text" id="resi" placeholder="Resi..." class="form-control">
		        </div>
		        <div class="form-group">
		        	<input type="text" id="kurir" placeholder="Kurir..." class="form-control">
		        </div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-primary" id="simpan-reku" data-kd="0">Simpan data</button>
		      </div>
		    </div>
		  </div>
		</div>
		<!-- Rating -->
		<div class="modal fade" id="rating" tabindex="-1" role="dialog" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Beri rating</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <div class="form-group">
		        	<select class="form-control rating">
		        		<?php 
		        			for ($i=1; $i <= 5 ; $i++) { 
		        				?>
		        				<option value="<?=$i?>"><?=$i?></option>
		        				<?php
		        			}
		        		 ?>
		        	</select>
		        </div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-primary" id="simpan-rating" data-tr="0">Simpan data</button>
		      </div>
		    </div>
		  </div>
		</div>
		<!-- alamat -->
		<div class="modal fade" id="alamatbuyer" tabindex="-1" role="dialog" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Info alamat</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		      	<ul class="list-group list-group-flush mt-2">
				  <li class="list-group-item">Provinsi: <span class="provinsinya"></span></li>
				  <li class="list-group-item">Kota: <span class="kotanya"></span></li>
				  <li class="list-group-item">Alamat: <span class="alamatnya"></span></li>
				</ul>
		      </div>
		    </div>
		  </div>
		</div>
		<!-- End Tabs -->
</div>
    <?php include"../../partials/footer.php"; ?>
  </body>
    <?php include"../../templates/footer.php"; ?>
    <script type="text/javascript">
    	$(document).ready(function(){
	    	let link = "<?=$_ENV['base_url']?>cms-dashboard/api/produk-cart"
    		$(".bukti").on('change',function(){
        		var fileList = $(this)[0].files[0];
                var t = window.URL || window.webkitURL;
                var objectUrl = t.createObjectURL(fileList);
                $('.modal-body').html('<img src="' + objectUrl + '" style="width:100%">');
    			$("#modal").modal('show')
    			let kd = $(this).next('.kd_transaksi').val()
	    		$("#simpan").on('click',function(){
	    			let files = new FormData
	    			files.append('aksi','check-transaksiku')
	    			files.append('kode',kd)
	    			files.append('foto',fileList)
			          $.ajax({
			            url : link,
			            method:"POST",
			            data:files,
					    dataType: 'json',
					    mimeType: 'multipart/form-data',
					    contentType: false,
					    cache: false,
					    processData: false,
			            success:function(data){
			              location.reload()
			            }
			          })
	    		})
    		})
    		$(".check").on('click',function(){
    			$("#check-modal").modal('show')
    			let kdModal = $(this).data("kd")
    			let buy = $(this).data("b").toString()
    			$.ajax({
    				url : link,
    				method: "POST",
    				data:{
    					aksi:'validasi-bukti',
    					kd:kdModal
    				},
    				dataType:'json',
    				success:function(data){
    					if (data[0].img === null) {
    						$('.check-modal').html('Kosong!');
    					}else{
               				$('.check-modal').html('<img src="<?=$_ENV['base_url']?>assets/image/bukti_tf/'+buy+'/'+data[0].img+'" style="width:100%">');
    					}
    				}
    			})
    		});
    		$(".reku").on('click',function(){
    			$("#resi-kurir").modal('show')
    			$("#simpan-reku").attr('data-kd',$(this).data('kd'))
    		});
			$("#simpan-reku").on('click',function(){
    			$.ajax({
    				url : link,
    				method: "POST",
    				data:{
    					aksi:'update-resi-kurir',
    					resi:$("#resi").val(),
    					kurir:$("#kurir").val(),
    					kd:$(this).data('kd')
    				},
    				dataType:'json',
    				success:function(data){
    					location.reload()
    				}
    			})
			})
			$(".rating").on('click',function(){
    			$("#rating").modal('show')
    			$("#simpan-rating").attr('data-tr',$(this).data('tr'))
			})
			$("#simpan-rating").on('click',function(){
    			$.ajax({
    				url : link,
    				method: "POST",
    				data:{
    					aksi:'tambah-rating',
    					rating:$(".rating :selected").val(),
    					kd_tr:$(this).data('tr')
    				},
    				dataType:'json',
    				success:function(data){
    					location.reload()
    				}
    			})
			})
			$(".alamat").on('click',function(){
				$("#alamatbuyer").modal('show')
				$.ajax({
					url : link,
					method: "POST",
					data:{
						aksi:'cek-alamat',
						id_peternak:$(this).data('id')
					},
					dataType:'json',
					success:function(data){
						$('.alamatnya').html(data[0].alamat)
						$('.provinsinya').html(data[0].provinsi)
						$('.kotanya').html(data[0].kota)
					}
				})
			})
    	})
    </script>
</html>