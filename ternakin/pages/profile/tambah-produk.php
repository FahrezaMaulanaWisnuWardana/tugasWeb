<?php 
  require_once"../../config/database.php";
  $title="Profile | ".$_SESSION['user']['nama'];
  require_once"../../templates/header.php";
  $sql = mysqli_query($con,"SELECT id_peternak , nama_lengkap , email , no_hp , alamat , no_rek , id_provinsi , id_kota , level FROM tb_peternak WHERE id_peternak='".$_SESSION['user']['id']."'");
  $data = mysqli_fetch_assoc($sql);
  $sqlProvinsi = mysqli_query($con,"SELECT * FROM tb_provinsi");
  $sqlKota = mysqli_query($con,"SELECT * FROM tb_kota");
  $sqlJenis = mysqli_query($con,"SELECT * FROM tb_produk_jenis");
  if ($data['level']==1) {
  	$_SESSION['alert']['gagal']="Silahkan daftar menjadi penjual!";
  	header("location:{$_ENV['base_url']}profile");
  }
 ?>
 <style type="text/css">
 	.card-profile{
 		margin-top: -120px;
 	}
 </style>
   <link rel="stylesheet" type="text/css" href="<?=$_ENV['base_url']?>cms-dashboard/assets/vendor/bootstrap-select/css/bootstrap-select.min.css">
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
				<a href="<?=$_ENV['base_url']?>profile" class="btn btn-success">Profile</a>
			</div>
		</div>
		<form method="POST" action="<?=$_ENV['base_url']?>pages/profile/aksi" enctype="multipart/form-data">
			<ul class="list-group list-group-flush mt-2">
			  <li class="list-group-item">
			  	<div class="form-group">
			  		<label>Nama Produk</label>
			  		<input type="text" name="nama_produk" class="form-control">
			  	</div>
			  </li>
			  <li class="list-group-item">
			  	<div class="form-group">
  					  <label>Foto Produk</label>
                      <input type="file" name="foto[]" id="myInput" class="form-control-file" accept="image/png , image/jpeg" multiple>
			  	</div>
			  </li>
			  <li class="list-group-item">
			  	<div class="form-group">
			  		<label>Jenis Produk</label>
			  		<select name="jenis" id="jenis" class="form-control selectpicker" data-live-search="true">
			  			<?php 
			  				while ($dataJenis = mysqli_fetch_array($sqlJenis)) {
			  					?>
			  					<option value="<?=$dataJenis['id_jenis_produk']?>">
			  						<?php
			  							if ($dataJenis['jenis_produk']==1) {
			  								$jenis = "Hewan Ternak";
			  							}else if($dataJenis['jenis_produk']==2){
			  								$jenis = "Pakan Ternak";
			  							}else if($dataJenis['jenis_produk']==3){
			  								$jenis = "Olahan Ternak";
			  							}
			  							echo $jenis.' - '.$dataJenis['nama_jenis_produk'];
			  						?>
			  					</option>
			  					<?php
			  				}
			  			 ?>
			  		</select>
			  	</div>
			  </li>
			  <li class="list-group-item">
			  	<div class="form-group">
			  		<label>Jumlah</label>
			  		<input type="number" name="jumlah" class="form-control">
			  	</div>
			  </li>
			  <li class="list-group-item">
			  	<div class="form-group">
			  		<label>Harga</label>
			  	</div>
				<div class="input-group mb-2">
			       <div class="input-group-prepend">
			          <div class="input-group-text">Rp.</div>
			       </div>
			        <input type="number" class="form-control" name="harga">
		      	</div>
			  </li>
			  <li class="list-group-item">
			  	<div class="form-group">
			  		<label>Deskripsi</label>
			  		<textarea class="form-control" name="deskripsi"></textarea>
			  	</div>
			  </li>
			  <li class="list-group-item">
			  	<div class="form-group">
			  		<label>Catatan</label>
			  		<textarea class="form-control" name="catatan"></textarea>
			  	</div>
			  </li>
			  <li class="list-group-item">
			  	<div class="form-group">
			  		<label>Provinsi</label>
			  		<select id="provinsi" name="provinsi" class="form-control selectpicker" data-live-search="true">
	              	<option <?=($data['id_provinsi']==NULL)?'selected':''; ?>>Silahkan pilih provinsi</option>
			  			<?php 
			  				while ($dataProv=mysqli_fetch_array($sqlProvinsi)) {
			  					?>
			  						<option value="<?=$dataProv['id_provinsi']?>"><?=$dataProv['nama_provinsi']?></option>
			  					<?php
			  				}
			  			 ?>
			  		</select>
			  	</div>
			  </li>
			  <li class="list-group-item">
	            <div class="form-group">
	              <label>Kota</label>
	              <select name="kota" id="kota" class="form-control">
	              	<option>Silahkan pilih provinsi</option>
	              </select>
	            </div>
			  </li>
			  <li class="list-group-item">
			  	<div class="form-group">
			  		<label>Alamat</label>
			  		<textarea class="form-control" name="alamat"></textarea>
			  	</div>
			  </li>
			  <li class="list-group-item">
	            <button type="submit" name="aksi" value="tambah-produk" class="btn btn-success form-control">Tambah Produk</button>
			  </li>
			</ul>
		</form>
	</div>
</div>
    <?php include"../../partials/footer.php"; ?>
  </body>
    <?php include"../../templates/footer.php"; ?>
  	<script src="<?=$_ENV['base_url']?>cms-dashboard/assets/vendor/bootstrap-select/js/bootstrap-select.min.js"></script>
  	<script type="text/javascript">
  		$(document).ready(function(){
      		$("#jenis").selectpicker()
      		$("#provinsi").selectpicker()
		      $("#provinsi").on('change',function(){
		        $('#kota').html('<option>Silahkan pilih provinsi</option>')
		        var html
		        let link ="<?=$_ENV['base_url']?>cms-dashboard/api/lokasi"

		        $.ajax({
		          url : link,
		          method:"POST",
		          data:{
		            aksi:'kota',
		            id:$(this).val()
		          },
		          dataType:'json',
		          success:function(data){
		            html += '<option>Pilih Kota</option>'
		            for (var a = 0; a < data.item.length; a++) {
		              console.log(data.item[a])
		              html +='<option value='+data.item[a].id_kota+'>'+data.item[a].nama+'</option>'
		            }
		            $('#kota').html(html)
		          }
		        });
		      });
  		})
  	</script>
</html>