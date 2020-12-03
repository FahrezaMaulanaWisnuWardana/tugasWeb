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
		    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Profile</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Data Transaksi</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Upload Bukti Transaksi</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" id="penjual-tab" data-toggle="tab" href="#penjual" role="tab" aria-controls="penjual" aria-selected="false">Data Produk</a>
		  </li>
		</ul>
		<div class="tab-content" id="myTabContent">
		  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
		  	<div class="table-responsive">
		  		<table class="table">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">First</th>
				      <th scope="col">Last</th>
				      <th scope="col">Handle</th>
				    </tr>
				  </thead>
				  <tbody>
				    <tr>
				      <th scope="row">1</th>
				      <td>Mark</td>
				      <td>Otto</td>
				      <td>@mdo</td>
				    </tr>
				    <tr>
				      <th scope="row">2</th>
				      <td>Jacob</td>
				      <td>Thornton</td>
				      <td>@fat</td>
				    </tr>
				    <tr>
				      <th scope="row">3</th>
				      <td>Larry</td>
				      <td>the Bird</td>
				      <td>@twitter</td>
				    </tr>
				  </tbody>
				</table>
		  	</div>
		  </div>
		  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
		  	<div class="table-responsive">
		  		<table class="table">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">First</th>
				      <th scope="col">Last</th>
				      <th scope="col">Handle</th>
				    </tr>
				  </thead>
				  <tbody>
				    <tr>
				      <th scope="row">1</th>
				      <td>Mark</td>
				      <td>Otto</td>
				      <td>@mdo</td>
				    </tr>
				    <tr>
				      <th scope="row">2</th>
				      <td>Jacob</td>
				      <td>Thornton</td>
				      <td>@fat</td>
				    </tr>
				    <tr>
				      <th scope="row">3</th>
				      <td>Larry</td>
				      <td>the Bird</td>
				      <td>@twitter</td>
				    </tr>
				  </tbody>
				</table>
		  	</div></div>
		  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
		  	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		  	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		  	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		  	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		  	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		  	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
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
		</div>
		<!-- End Tabs -->
</div>
    <?php include"../../partials/footer.php"; ?>
  </body>
    <?php include"../../templates/footer.php"; ?>
</html>