<?php 
	$title = "Login Ternakin";
	include"../../config/database.php";
  	include"../../templates/header.php";
    (isset($_SESSION['user']['id']))?header("location:{$_ENV['base_url']}profile"):'';
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
                  <div class="alert alert-danger text-center" role="alert">
                    <?=$_SESSION['alert']['gagal']?>
                  </div>
                  <?php
                }
                unset($_SESSION['alert']);
              }
            ?>
  				<div class="card-body">
  					<div class="card-title text-center text-uppercase">
  						<h2>masuk ternakin</h2>
  					</div>
  					<form method="POST" action="<?=$_ENV['base_url']?>pages/login/aksi">
	  					<div class="input-group mb-2">
					        <div class="input-group-prepend">
					          <div class="input-group-text"><i class="bx bxs-user"></i></div>
					        </div>
					        <input type="email" class="form-control" name="email" placeholder="Email...">
				      	</div>
	  					  <div class="input-group mb-2">
					        <div class="input-group-prepend">
					          <div class="input-group-text"><i class="bx bxs-key"></i></div>
					        </div>
					        <input type="password" class="form-control" name="password" placeholder="Password...">
				      	</div>
				      	<div class="form-group">
				      		<input type="submit" name="aksi" class="btn btn-success form-control text-uppercase" value="masuk">
				      	</div>
  					</form>
			      	<div class="d-flex justify-content-between">
			      		<a href="<?=$_ENV['base_url']?>daftar">Daftar</a>
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