<?php 
	require_once"../../../config/database.php";
	$aksi = $_POST['aksi'];
	$path = $_SERVER['DOCUMENT_ROOT']."/tugasWeb/ternakin/assets/image/slider/";
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
			$judul = $_POST['judul'];
			$subjudul = $_POST['subjudul'];
			$deskripsi = $_POST['deskripsi'];
			$link = $_POST['link'];
			$total = count($_FILES['foto']['name']);
			$data = implode(',', $_FILES['foto']['name']);

			$sqlData = mysqli_query($con,"SELECT * FROM tb_carousel WHERE id_carousel='".$id."'");
			$dataCarousel = mysqli_fetch_assoc($sqlData);
			$carousel = explode(',', $dataCarousel['img_carousel']);
			
			for ($i=0; $i < $total; $i++) { 
				$tmp = $_FILES['foto']['tmp_name'][$i];
				$name = $_FILES['foto']['name'][$i];
				$base_dir = $path.basename($name);
				unlink($base_dir.$carousel[$i]);
				if (move_uploaded_file($tmp, $base_dir)) {
					$sql = mysqli_query($con,"UPDATE tb_carousel SET img_carousel='".$data."' , judul='".$judul."' , sub_judul='".$subjudul."' , deskripsi='".$deskripsi."' , url='".$link."' WHERE id_carousel ='".$id."' ") or die(mysqli_error($con));
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