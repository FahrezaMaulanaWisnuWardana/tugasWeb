<?php 
	require_once"../../../config/database.php";
	$aksi = $_POST['aksi'];
	switch ($aksi) {
		case 'edit-tentang':
			$id = $_POST['id_about'];
			$isi = $_POST['content'];
				$sql = mysqli_query($con,"UPDATE tb_about_us SET isi='".$isi."' WHERE id_about ='".$id."' ") or die(mysqli_error($con));
					($sql)?$_SESSION['alert']['berhasil'] ="Berhasil edit tentang kami":$_SESSION['alert']['gagal'] ="Gagal edit tentang kami";
					header("location:{$_ENV['base_url']}".'cms-dashboard/pages/cms'."");
			break;
		case 'edit-slider':
			$id = $_POST['id_carousel'];
			$total = count($_FILES['foto']['name']);
			$data = implode(',', $_FILES['foto']['name']);
			for ($i=0; $i < $total; $i++) { 
				$tmp = $_FILES['foto']['tmp_name'][$i];
				$name = $_FILES['foto']['name'][$i];
				$base_dir = $_SERVER['DOCUMENT_ROOT']."/tugasWeb/ternakin/assets/image/slider/".basename($name);
				if (move_uploaded_file($tmp, $base_dir)) {
					$sql = mysqli_query($con,"UPDATE tb_carousel SET img_carousel='".$data."' WHERE id_carousel ='".$id."' ") or die(mysqli_error($con));
					$_SESSION['alert']['berhasil'] ="Berhasil edit Slider";
				}else{
					$_SESSION['alert']['gagal'] ="Gagal edit slider";
				}
			}
			header("location:{$_ENV['base_url']}".'cms-dashboard/pages/cms'."");
			break;
		default:
			header("HTTP/1.0 404 Not Found");
			break;
	}
 ?>