<?php 
	include"config/koneksi.php";
	session_start();
	if (isset($_POST['aksi'])){
		if ($_POST['aksi']=="tambah-mahasiswa") {
			$nim = $_POST['nim'];
			$nama = $_POST['nama'];
			$alamat = $_POST['alamat'];
			$tgl = $_POST['tgl'];
			$query = mysqli_query($con,"INSERT INTO mahasiswa VALUES('".$nim."','".$nama."','".$alamat."','".$tgl."')");
			if ($query) {
				$_SESSION['alert'] = "Berhasil tambah data";
			}else{
				$_SESSION['alert-salah'] = "Oops sepertinya NIM sudah ada";
			}
			header('location:../index.php');
		}else if($_POST['aksi']=="update-mahasiswa"){
			$nim = $_POST['nim'];
			$nama = $_POST['nama'];
			$alamat = $_POST['alamat'];
			$tgl = $_POST['tgl'];
			$id = $_POST['id'];
			$query = mysqli_query($con,"UPDATE mahasiswa SET nim='".$nim."' , nama='".$nama."',alamat='".$alamat."',tgllahir='".$tgl."' WHERE nim='".$id."'");
			if ($query) {
				$_SESSION['alert'] = "Berhasil update data";
			}else{
				$_SESSION['alert-salah'] = "Oops sepertinya NIM sudah ada";
			}
			header('location:../index.php');
		}else if($_POST['aksi']=="hapus-mahasiswa"){
			$nim = $_POST['nim'];
			$query = mysqli_query($con,"DELETE FROM mahasiswa WHERE nim='$nim'");
			if ($query) {
				$_SESSION['alert'] = "Berhasil hapus data";
			}else{
				$_SESSION['alert-salah'] = "Oops ada yang salah";
			}
			header('location:../index.php');
		}
	}else{
		$_SESSION['alert-salah'] = "Oops aksi tidak tersedia";
		header('location:../index.php');
	}
 ?>