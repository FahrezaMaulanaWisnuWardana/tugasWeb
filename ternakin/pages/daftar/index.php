<?php 
	$title = "Daftar Ternakin";
	include"../../config/database.php";
  	include"../../templates/header.php";
 ?>
</head>
    <?php 
      include"../../partials/navbar.php"; 
    ?>
    <div class="container my-5">
      <div class="row">
      	<div class="col-lg-6 col-sm-12 mx-auto">
  			<div class="card">
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
	                <div class="alert alert-danger" role="alert">
	                  <?=$_SESSION['alert']['gagal']?>
	                </div>
	                <?php
	              }
	              unset($_SESSION['alert']);
	            }
	          ?>
  				<div class="card-body">
  					<div class="card-title text-center text-uppercase">
  						<h2>daftar ternakin</h2>
  					</div>
  					<form method="POST" action="<?=$_ENV['base_url']?>pages/daftar/aksi">
	  					<div class="input-group mb-2">
					        <div class="input-group-prepend">
					          <div class="input-group-text"><i class="bx bxs-user"></i></div>
					        </div>
					        <input type="text" name="nama" class="form-control" placeholder="Nama...">
				      	</div>
	  					<div class="input-group mb-2">
					        <div class="input-group-prepend">
					          <div class="input-group-text">@</div>
					        </div>
					        <input type="text" name="email" class="form-control" placeholder="Email...">
				      	</div>
	  					<div class="input-group mb-2">
					        <div class="input-group-prepend">
					          <div class="input-group-text"><i class="bx bxs-key"></i></div>
					        </div>
					        <input type="password" name="password" class="form-control" placeholder="Password...">
				      	</div>
	  					<div class="input-group mb-2">
					        <div class="input-group-prepend">
					          <div class="input-group-text"><i class="bx bxs-phone"></i></div>
					        </div>
					        <input type="number" name="hp" class="form-control" placeholder="No Hp...">
				      	</div>
				      	<div class="form-group">
				      		<input type="submit" name="aksi" class="btn btn-success form-control text-uppercase" value="daftar">
				      	</div>
  					</form>
			      	<div class="text-center">
			      		<small class="text-danger d-block">mempunyai akun? silahkan masuk</small>
			      		<a href="<?=$_ENV['base_url']?>login">masuk</a>
			      	</div>
  				</div>
  			</div>
      	</div>
      </div>
    </div>
    <?php include"../../partials/footer.php"; ?>
  </body>
    <?php include"../../templates/footer.php"; ?>
</html>