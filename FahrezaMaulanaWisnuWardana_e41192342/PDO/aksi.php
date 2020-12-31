<?php 
	require_once"library.php";
	if (isset($_POST['aksi'])) {
		switch ($_POST['aksi']) {
			case 'tambah':
				$nim = $_POST['nim'];
				$nama = $_POST['nama'];
				$alamat = $_POST['alamat'];
				$tgl = $_POST['tgl'];
				$sql = "INSERT INTO mahasiswa VALUES(:nim,:nama,:alamat,:tgllahir)";
				try {
					$query = $con->prepare($sql);
					$query->bindParam(':nim',$nim,PDO::PARAM_STR);
					$query->bindParam(':nama',$nama,PDO::PARAM_STR);
					$query->bindParam(':alamat',$alamat,PDO::PARAM_STR);
					$query->bindParam(':tgllahir',$tgl,PDO::PARAM_STR);
					$query->execute();
					header("location:index.php");
				} catch (PDOException $e) {
					return $e->getMessage();
				}
				break;
			case 'update':
				$nim_now = $_POST['nim_now'];
				$nim = $_POST['nim'];
				$nama = $_POST['nama'];
				$alamat = $_POST['alamat'];
				$tgl = $_POST['tgl'];
				$sql = "UPDATE mahasiswa SET nim='".$nim."' , nama='".$nama."' , alamat='".$alamat."', tgllahir='".$tgl."' WHERE nim='".$nim_now."'";
				try {
					$query = $con->prepare($sql);
					$query->execute();
					header("location:index.php");
				} catch (Exception $e) {
					return $e->getMessage();	
				}
				break;
			case 'hapus':
				$nim = $_POST['nim'];
				$sql = "DELETE FROM mahasiswa WHERE nim='".$nim."'";
				try {
					$query = $con->prepare($sql);
					$query->execute();
					header("location:index.php");
				} catch (PDOException $e) {
					return $e->getMessage();	
				}
				break;
			default:
				header("HTTP/1.0 404 Not Found");
			break;
		}
	}else{
		header("HTTP/1.0 404 Not Found");
	}
 ?>