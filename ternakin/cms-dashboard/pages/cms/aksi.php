<?php 
	require_once"../../../config/database.php";
	$aksi = $_POST['aksi'];
	switch ($aksi) {
		case 'edit-tentang':
			$id = $_POST['id_about'];
			$isi = $_POST['content'];
			var_dump($_POST);
				$sql = mysqli_query($con,"UPDATE tb_about_us SET isi='".$isi."' WHERE id_about ='".$id."' ") or die(mysqli_error());
					($sql)?$_SESSION['alert']['berhasil'] ="Berhasil edit tentang kami":$_SESSION['alert']['gagal'] ="Gagal edit tentang kami";
					header("location:{$_ENV['base_url']}".'cms-dashboard/pages/cms'."");
			break;
		case 'edit-slider':
					($sql)?$_SESSION['alert']['berhasil'] ="Berhasil edit Slider":$_SESSION['alert']['gagal'] ="Gagal edit slider";
					header("location:{$_ENV['base_url']}".'cms-dashboard/pages/cms'."");
			break;
		default:
			# code...
			break;
	}
 ?>