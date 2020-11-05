<?php 
	session_start();
 ?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="assets/css/style-dash.css">
	<link rel="stylesheet" type="text/css" href="assets/css/grid.css">
	<link rel="stylesheet" type="text/css" href="assets/font-aw/css/font-awesome.min.css">
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="js/script-back.js"></script>
	<title></title>
</head>
<body>
		<header>
			<div class="navbar-title">
				<div class="toggle-nav">
					<i class="fa fa-bars fa-lg"></i>
				</div>
				<a href="#">Webku</a>
			</div>
			<div class="navbar-nav">
				<ul class="menu">
					<li><a href="#"> Logout</a></li>
				</ul>
			</div>
		</header>
		<div id="side-nav-box">
			<div class="profile-side-nav">
				<div class="profile-side">
						<div class="profile-side-img">
							<img src="image/profile.png">
						</div>
				</div>
				<div class="nav-side">
					<ul>
						<li><a href="#" class="toggle"><i class="fa fa-plus-circle"></i><span>Coba</span></a>
							<ul class="side-submenu">
								<li><a href="#">Tambah Coba</a></li>
							</ul>
						</li>
						<li><a href="#" class="toggle"><i class="fa fa-user-circle"></i><span>Profile</span></a></li>
						<li><a href="#" class="toggle"><i class="fa fa-newspaper-o"></i><span>Berita</span></a>
						</li>
						<li id="gear-list"><a href="#"><i class="fa fa-cog" id="gear"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
		<div id="content-wrapper">
			<div class="title">
				<h3>Cek Diskon</h3>
			</div>
			<div id="page-wrapper">
				<form method="POST" action="diskon.php">
					<div class="form-group col-6">
						<div class="label">Harga</div>
						<div class="input">
							<input type="number" name="harga" class="form-control" id="rupiah" placeholder="Rp.">
						</div>
					</div>
					<div class="form-group col-6">
						<div class="label">Diskon</div>
						<div class="input">
							<input type="number" name="diskon" class="form-control" placeholder="%">
						</div>
					</div>
					<div class="col-12">
						<div class="form-group">
							<div class="input">
								<input type="submit" name="" class="form-control">
							</div>
						</div>
					</div>
				</form>
				<h3>
					Total Harga : 
					<?php 
						if (isset($_SESSION['hasil'])) {
							echo "Rp " . number_format($_SESSION['hasil'],2,',','.');
						}else{
							echo '';
						}
						session_unset();
						session_destroy();
					?>
				</h3>
			</div>
		</div>
</body>
</html>