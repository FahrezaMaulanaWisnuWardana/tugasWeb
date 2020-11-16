<?php 
	require_once"../../../config/database.php";
	$aksi = $_POST['aksi'];
	switch ($aksi) {
		case 'tambah':
			$nama = $_POST['nama'];
			$username = $_POST['username'];
			$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
			$provinsi = $_POST['provinsi'];
			$kota = $_POST['kota'];
			$alamat = $_POST['alamat'];
			$level = $_POST['level'];
			$query = mysqli_query($con, "INSERT INTO tb_users VALUES(NULL,'".$nama."','".$username."','".$password."','".$provinsi."','".$kota."','".$alamat."','".$level."','".date("Y-m-d h:i:s")."','null')")or die(mysqli_error($con));
			($query)? $_SESSION['alert']['berhasil'] = "Berhasil Tambah User" : $_SESSION['alert']['gagal'] = "Gagal Tambah User" ;
			header("location:{$_ENV['base_url']}".'cms-dashboard/pages/users'."");
			break;
		case 'hapus-user':
			$id = $_POST['id_user'];
			$query = mysqli_query($con,"DELETE FROM tb_users WHERE id_users = '$id'");
			($query)? $_SESSION['alert']['berhasil'] = "Berhasil Hapus User" : $_SESSION['alert']['gagal'] = "Gagal Hapus User" ;
			header("location:{$_ENV['base_url']}".'cms-dashboard/pages/users'."");
			break;
		case 'update-user':
			$id = $_POST['id_user'];
			$nama = $_POST['nama'];
			$username = $_POST['username'];
			$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
			$provinsi = $_POST['provinsi'];
			$kota = $_POST['kota'];
			$alamat = $_POST['alamat'];
			$level = $_POST['level'];
			if ($_POST['password']=="") {
				$query = mysqli_query($con,"UPDATE tb_users SET nama='".$nama."' , username='".$username."' , id_provinsi='".$provinsi."' , id_kota='".$kota."' , alamat='".$alamat."' , level='".$level."' , updated_at='".date("Y-m-d h:i:s")."' WHERE id_users='".$id."' ") or die(mysqli_error($con));
			}else{
				$query = mysqli_query($con,"UPDATE tb_users SET nama='".$nama."' , username='".$username."' , id_provinsi='".$provinsi."' , password='".$password."' , id_kota='".$kota."' , alamat='".$alamat."' , level='".$level."' , updated_at='".date("Y-m-d h:i:s")."' WHERE id_users='".$id."' ") or die(mysqli_error($con));
			}
			($query)? $_SESSION['alert']['berhasil'] = "Berhasil Update User" : $_SESSION['alert']['gagal'] = "Gagal Update User" ;
			header("location:{$_ENV['base_url']}".'cms-dashboard/pages/users'."");
			break;
		default:
			header("HTTP/1.0 404 Not Found");
			break;
	}
?>