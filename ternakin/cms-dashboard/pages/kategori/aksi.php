<?php 
	require_once"../../../config/database.php";
	$aksi = $_POST['aksi'];
	$path = $_SERVER['DOCUMENT_ROOT']."/tugasWeb/ternakin/assets/image/kategori/";
	switch ($aksi) {
		case 'tambah':
			$nama		= $_POST['nama'];

			$lokasi_file = $_FILES['icon']['tmp_name'];
			$tipe_file   = $_FILES['icon']['type'];
			$nama_file   = $_FILES['icon']['name'];
			$direktori = $path.basename($nama_file);
			if (!empty($lokasi_file)) {
				if (move_uploaded_file($lokasi_file,$direktori)) {
					$query_tambah	= mysqli_query($con,"INSERT INTO tb_produk_jenis VALUES (NULL,  '$nama',  '$nama_file')");
					($query_tambah)?$_SESSION['alert']['berhasil'] ="Berhasil membuat kategori": $_SESSION['alert']['gagal'] ="Gagal membuat produk jenis";
				} else {
					$_SESSION['alert']['gagal'] ="Oops ada sesuatu yang salah";
				}
			} else {
				$query_tambah	= mysqli_query($con,"INSERT INTO tb_produk_jenis VALUES (NULL,  '$nama',  NULL)");
				($query_tambah)?$_SESSION['alert']['berhasil'] ="Berhasil membuat kategori": $_SESSION['alert']['gagal'] ="Gagal membuat produk jenis";
			}
			header("location:{$_ENV['base_url']}".'cms-dashboard/pages/kategori'."");
			break;
		case 'hapus':
			$id = $_POST['id_jenis'];
			$sql = mysqli_query($con,"DELETE FROM tb_produk_jenis WHERE id_jenis_produk='".$id."'") or die(mysqli_error($con));
			($sql)? $_SESSION['alert']['berhasil'] = "Berhasil hapus kategori" : $_SESSION['alert']['gagal'] = "Gagal hapus kategori" ;
			header("location:{$_ENV['base_url']}".'cms-dashboard/pages/kategori'."");
			break;
		case 'edit':
			$id = $_POST['id'];
			$nama = $_POST['nama'];
			$lokasi_file = $_FILES['icon']['tmp_name'];
			$tipe_file   = $_FILES['icon']['type'];
			$nama_file   = $_FILES['icon']['name'];
			$direktori = $path.basename($nama_file);

			if (!empty($lokasi_file)) {
				if (move_uploaded_file($lokasi_file,$direktori)) {
					$query_ambil_file_gambar_lama	= mysqli_query($con,"SELECT produk_jenis_img FROM tb_produk_jenis WHERE id_jenis_produk = '$id'");
					$data_file_gambar_lama			= mysqli_fetch_assoc($query_ambil_file_gambar_lama);
					
					unlink($direktori.$data_file_gambar_lama['produk_jenis_img']);
					
					$query_update	= mysqli_query($con,"UPDATE tb_produk_jenis SET nama_jenis_produk = '$nama', produk_jenis_img = '$nama_file' WHERE id_jenis_produk = '$id'");
					($query_update)?$_SESSION['alert']['berhasil'] ="Berhasil ubah kategori":$_SESSION['alert']['gagal'] ="Gagal ubah kategori";
				} else {
					$_SESSION['alert']['gagal'] ="Oops ada sesuatu yang salah";
				}
			} else {
				$query_update	= mysqli_query($con,"UPDATE tb_produk_jenis SET nama_jenis_produk = '$nama' WHERE id_jenis_produk = '$id'");
				($query_update)?$_SESSION['alert']['berhasil'] ="Berhasil ubah kategori":$_SESSION['alert']['gagal'] ="Gagal ubah kategori";
			}
			header("location:{$_ENV['base_url']}".'cms-dashboard/pages/kategori'."");
			break;
		default:
			header("HTTP/1.0 404 Not Found");
			break;
	}
 ?>