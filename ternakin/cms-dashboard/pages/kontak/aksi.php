<?php 
	require_once"../../../config/database.php";
	$aksi = $_POST['aksi'];
	$path = $_SERVER['DOCUMENT_ROOT']."/tugasWeb/ternakin/assets/image/kontak/";
	switch ($aksi) {
		case 'tambah':
			$nama		= $_POST['nama'];

			$lokasi_file = $_FILES['icon']['tmp_name'];
			$tipe_file   = $_FILES['icon']['type'];
			$nama_file   = $_FILES['icon']['name'];
			$direktori   = $path.$nama_file;

			if (!empty($lokasi_file)) {
				if (move_uploaded_file($lokasi_file,$direktori)) {
							
					$query_tambah	= mysqli_query($con,"INSERT INTO tb_kontak VALUES ('',  '$nama',  '$nama_file')") or die(mysqli_error($con));
					($query_tambah)?$_SESSION['alert']['berhasil'] ="Berhasil membuat kontak": $_SESSION['alert']['gagal'] ="Gagal membuat kontak";
				} else {
					$_SESSION['alert']['gagal'] ="Oops ada sesuatu yang salah";
				}
			} else {
				$_SESSION['alert']['gagal'] ="Ikon wajib di isi";
			}	
				header("Location: index.php");
			break;
		case 'hapus-kontak':
			$id = $_POST['id_kontak'];
			$query = mysqli_query($con,"DELETE FROM tb_kontak WHERE id_kontak = '$id'");
			($query)? $_SESSION['alert']['berhasil'] = "Berhasil Hapus Kontak" : $_SESSION['alert']['gagal'] = "Gagal Hapus Kontak" ;
			header("Location: index.php");
			break;
		case 'update-kontak':
			$id_kontak = $_POST['id_kontak'];
			$nama = $_POST['nama'];
			$lokasi_file = $_FILES['icon']['tmp_name'];
			$tipe_file   = $_FILES['icon']['type'];
			$nama_file   = $_FILES['icon']['name'];
			$direktori   = $path.$nama_file;

			if (!empty($lokasi_file)) {
				if (move_uploaded_file($lokasi_file,$direktori)) {
					$query_ambil_file_gambar_lama	= mysqli_query($con,"SELECT icon FROM tb_kontak WHERE id_kontak = '$id_kontak'");
					$data_file_gambar_lama			= mysqli_fetch_array($query_ambil_file_gambar_lama);
					
					unlink($path.$nama_file.$data_file_gambar_lama['icon']);
					
					$query_update	= mysqli_query($con,"UPDATE tb_kontak SET nama = '$nama', icon = '$nama_file' WHERE id_kontak = '$id_kontak'");
					($query_update)?$_SESSION['alert']['berhasil'] ="Berhasil ubah kontak":$_SESSION['alert']['gagal'] ="Gagal ubah kontak";
					header("Location: index.php");
				} else {
					$_SESSION['alert']['gagal'] ="Oops ada sesuatu yang salah";
					header("Location: index.php");
				}
			} else {
				$query_update	= mysqli_query($con,"UPDATE tb_kontak SET nama = '$nama' WHERE id_kontak = '$id_kontak'");
				($query_update)?$_SESSION['alert']['berhasil'] ="Berhasil ubah kontak":$_SESSION['alert']['gagal'] ="Gagal ubah kontak";
				header("Location: index.php");
			}
			break;
		default:
			header("HTTP/1.0 404 Not Found");
			break;
	}
?>