<?php 
	include"koneksi.php";
	$aksi = $_POST['aksi'];
	switch ($aksi) {
		case'tambah':
			$nama = $_POST['nama'];
			$alamat = $_POST['alamat'];
			$pekerjaan = $_POST['pekerjaan'];
			mysqli_query($con,"INSERT INTO tb_user VALUES(NULL,'".$nama."','".$alamat."','".$pekerjaan."')");
			header("location:index.php");
			break;
		case'update':
			$id = $_POST['id'];
			$nama = $_POST['nama'];
			$alamat = $_POST['alamat'];
			$pekerjaan = $_POST['pekerjaan'];
			mysqli_query($con,"UPDATE tb_user SET nama='".$nama."' , alamat='".$alamat."', pekerjaan='".$pekerjaan."' WHERE id='".$id."' ");
			header("location:index.php");
			break;
		case'hapus':
			mysqli_query($con,"DELETE FROM tb_user WHERE id='".$_POST['id']."'");
			header("location:index.php");
			break;
		default:
			
			break;
	}
 ?>