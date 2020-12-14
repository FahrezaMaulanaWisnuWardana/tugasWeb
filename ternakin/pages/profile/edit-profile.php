<?php 
  require_once"../../config/database.php";
  $title="Profile | ".$_SESSION['user']['nama'];
  require_once"../../templates/header.php";
  $sql = mysqli_query($con,"SELECT id_peternak , img_profile , nama_lengkap , email , no_hp , alamat , no_rek , id_provinsi , id_kota , level FROM tb_peternak WHERE id_peternak='".$_SESSION['user']['id']."'");
  $data = mysqli_fetch_assoc($sql);
  $sqlProvinsi = mysqli_query($con,"SELECT * FROM tb_provinsi");
  $sqlKota = mysqli_query($con,"SELECT * FROM tb_kota");
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
				<img src="<?=is_null($data['img_profile'])?'https://i.pinimg.com/originals/0c/3b/3a/0c3b3adb1a7530892e55ef36d3be6cb8.png':$_ENV['base_url'].'assets/profile/'.$data['id_peternak'].'/'.$_data['img_profile'];?>" style="width: 100%;">
			</div>
			<div class="card-profile d-flex align-items-center">
				<a href="<?=$_ENV['base_url']?>profile" class="btn btn-success">Profile</a>
			</div>
		</div>
		<form method="POST" action="<?=$_ENV['base_url']?>pages/profile/aksi" enctype="multipart/form-data">
			<ul class="list-group list-group-flush mt-2">
			  <li class="list-group-item">
			  	<div class="form-group">
			  		<label>Foto Profile</label>
			  		<input type="file" name="file" class="form-control-file">
			  	</div>
			  </li>
			  <li class="list-group-item">
			  	<div class="form-group">
			  		<label>Nama Lengkap</label>
			  		<input type="text" name="nama" value="<?=$data['nama_lengkap']?>" class="form-control">
			  	</div>
			  </li>
			  <li class="list-group-item">
			  	<div class="form-group">
			  		<label>Email</label>
			  		<input type="email" name="email" value="<?=$data['email']?>" class="form-control">
			  	</div>
			  </li>
			  <li class="list-group-item">
			  	<div class="form-group">
			  		<label>No Hp</label>
			  		<input type="number" name="no_hp" value="<?=$data['no_hp']?>" class="form-control">
			  	</div>
			  </li>
			  <li class="list-group-item">
			  	<div class="form-group">
			  		<label>Alamat</label>
			  		<textarea name="alamat" class="form-control"><?=$data['alamat']?></textarea>
			  	</div>
			  </li>
			  <li class="list-group-item">
			  	<div class="form-group">
			  		<label>No Rekening</label>
			  		<input type="number" name="no_rek" value="<?=$data['no_rek']?>" class="form-control">
			  		<small class="text-danger">*Isi jika anda ingin menjadi penjual</small>
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
			  						<option value="<?=$dataProv['id_provinsi']?>"<?=($data['id_provinsi']==$dataProv['id_provinsi'])?'selected':''; ?>><?=$dataProv['nama_provinsi']?></option>
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
	              	<option <?=($data['id_kota']==NULL)?'selected':''; ?>>Silahkan pilih provinsi</option>
	                    <?php 
	                      while ($dataKot = mysqli_fetch_array($sqlKota)) {
	                        ?>
	                          <option value="<?=$dataKot['id_kota']?>" <?=($data['id_kota']==$dataKot['id_kota'])?'selected':''; ?>><?=$dataKot['nama_kota']?></option>
	                        <?php
	                      }
	                    ?>
	              </select>
	            </div>
			  </li>
			  <li class="list-group-item">
	            <button type="submit" name="aksi" value="edit-profile" class="btn btn-success form-control">Edit</button>
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