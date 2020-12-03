<!DOCTYPE html>
<html>
<head>
	<title>Halaman Daftar</title>
	<link rel="stylesheet" type="text/css" href="assets/font-aw/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/login.css">
	<style type="text/css">
		.alert{
			position: relative;
		    padding: .75rem 1.25rem;
		    border: 1px solid transparent;
		}
		.alert-danger{
		    color: #721c24;
		    background-color: #f8d7da;
		    border-color: #f5c6cb;
		}
		.alert-success{
		    color: #155724;
		    background-color: #d4edda;
		    border-color: #c3e6cb;
		}
	</style>
</head>
<body>
	<div class="container">
	<?php session_start();
	if (isset($_SESSION['alert'])) {
		if(isset($_SESSION['alert']['danger'])){
			?>
			<div class="alert alert-danger">
				<?=$_SESSION['alert']['danger'];?>
			</div>
			<?php
		}else{
			?>
			<div class="alert alert-success">
				<?=$_SESSION['alert']['success'];?>
			</div>
			<?php
		}
	}
		session_unset();
		session_destroy(); 
	?>
			<div class="left">
				<div class="intro">
					<div class="desc">
						<h3>Halaman Daftar</h3>
						<p>Fahreza Maulana WW</p>
					</div>
				</div>
			</div>
			<div class="right">
			<div class="head">
				<h3>Daftar</h3>
			</div>
				<form id="box-login" method="POST" action="act_login.php" style="margin-top: 0!important" autocomplete="off">
					<label><b><i>N</i></b>ame </label>
						<div class="user">
							<input type="text" name="nama" placeholder="Name">
						</div>
					<label><b><i>U</i></b>sername </label>
						<div class="user">
							<input type="text" name="username" placeholder="Username">
						</div>
					<label><b><i>P</i></b>assword </label>
						<div class="user1">
							<input type="password" name="password" placeholder="Password">
						</div>
					<input type="hidden" name="aksi" value="daftar">
					<input type="submit" value="Masuk" name="submit">
					<a href="index.php">masuk</a>
				</form>
			</div>
		
		</div>
</body>
</html>