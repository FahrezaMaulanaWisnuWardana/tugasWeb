<?php 
	require_once"../../../config/database.php";
	$aksi = $_POST['aksi'];
	switch ($aksi) {
		case 'tambah-kota':
			$id_kota = $_POST['id_kota'];
			$kota = $_POST['kota'];
			$idProv = $_POST['provinsi'];
			$sql = mysqli_query($con,"INSERT INTO tb_kota VALUES('".$id_kota."','".$idProv."','".$kota."')") or die(mysqli_error($con));
			($sql)? $_SESSION['alert']['berhasil'] = "Berhasil tambah kota" : $_SESSION['alert']['gagal'] = "Gagal tambah kota" ;
			header("location:{$_ENV['base_url']}".'cms-dashboard/pages/lokasi/kota'."");
			break;
		case 'edit-kota':
			$idz = $_POST['id_kotaz'];
			$id = $_POST['id_kota'];
			$kota = $_POST['kota'];
			$idProv = $_POST['provinsi'];
			$sql = mysqli_query($con,"UPDATE tb_kota SET id_kota='".$id."' , id_provinsi='".$idProv."',nama_kota='".$kota."' WHERE id_kota='".$idz."'") or die(mysqli_error($con));
			($sql)? $_SESSION['alert']['berhasil'] = "Berhasil edit kota" : $_SESSION['alert']['gagal'] = "Gagal edit kota" ;
			header("location:{$_ENV['base_url']}".'cms-dashboard/pages/lokasi/kota'."");
			break;
		case 'hapus-kota':
			$id = $_POST['id_kota'];
			$sql = mysqli_query($con,"DELETE FROM tb_kota WHERE id_kota='".$id."'") or die(mysqli_error($con));
			($sql)? $_SESSION['alert']['berhasil'] = "Berhasil hapus kota" : $_SESSION['alert']['gagal'] = "Gagal hapus kota" ;
			header("location:{$_ENV['base_url']}".'cms-dashboard/pages/lokasi/kota'."");
			break;
		case 'tambah-provinsi':
			$id = $_POST['id_provinsi'];
			$provinsi = $_POST['provinsi'];
			$sql = mysqli_query($con,"INSERT INTO tb_provinsi VALUES('".$id."','".$provinsi."')") or die(mysqli_error($con));
			($sql)? $_SESSION['alert']['berhasil'] = "Berhasil tambah provinsi" : $_SESSION['alert']['gagal'] = "Gagal tambah provinsi" ;
			header("location:{$_ENV['base_url']}".'cms-dashboard/pages/lokasi/provinsi'."");
			break;
		case 'edit-provinsi':
			$id = $_POST['id_provinsi'];
			$provinsi = $_POST['provinsi'];
			$sql = mysqli_query($con,"UPDATE tb_provinsi SET nama_provinsi='".$provinsi."' WHERE id_provinsi='".$id."'") or die(mysqli_error($con));
			($sql)? $_SESSION['alert']['berhasil'] = "Berhasil edit provinsi" : $_SESSION['alert']['gagal'] = "Gagal edit provinsi" ;
			header("location:{$_ENV['base_url']}".'cms-dashboard/pages/lokasi/provinsi'."");
			break;
		case 'hapus-provinsi':
			$id = $_POST['id_provinsi'];
			$sql = mysqli_query($con,"DELETE FROM tb_provinsi WHERE id_provinsi='".$id."'") or die(mysqli_error($con));
			($sql)? $_SESSION['alert']['berhasil'] = "Berhasil hapus provinsi" : $_SESSION['alert']['gagal'] = "Gagal hapus provinsi" ;
			header("location:{$_ENV['base_url']}".'cms-dashboard/pages/lokasi/provinsi'."");
			break;
		default:
			header("HTTP/1.0 404 Not Found");
			break;
	}
 ?>