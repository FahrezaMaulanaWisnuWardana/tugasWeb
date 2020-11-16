<?php 
	require_once"../../config/checker.php";
	session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		*{
			padding:0;
			margin:0;
			box-sizing: border-box;
		}
		input{
			display: block;
			width: 100%;
			margin: 10px 0;
			padding:10px;
		}
		form{
			width: 50%;
			margin:50px auto;
		}
		.alert{
			text-align: center;
			margin:20px auto;
			padding: 20px;
		}
	</style>
</head>
<body>
	<?php 
			if (isset($_SESSION['alert'])) {
				if (isset($_SESSION['alert']['berhasil'])) {
					?>
						<div class="alert"><?=$_SESSION['alert']['berhasil']?></div>
					<?php
				}else{
					?>
						<div class="alert"><?=$_SESSION['alert']['gagal']?></div>
					<?php
				}
			}
	 ?>
<form method="POST" action="<?=$_ENV['base_url']?>pages/daftar/aksi">
	<input type="text" name="nama" placeholder="Nama">
	<input type="email" name="email" placeholder="Email">
	<input type="password" name="password" placeholder="Password">
	<input type="number" name="hp" placeholder="Hp">
	<input type="submit" name="aksi" value="daftar">
</form>
</body>
</html>