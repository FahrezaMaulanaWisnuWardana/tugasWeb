<?php 
		require_once"../../config/database.php";

		$aksi = $_POST['aksi'];

		switch ($aksi) {
			case 'daftar':
				$nama = $_POST['nama'];
				$email = $_POST['email'];
				$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
				$hp = $_POST['hp'];
				$sql = mysqli_query($con,"INSERT INTO tb_peternak VALUES(NULL,'".$nama."','".$email."','".$password."','".$hp."', NULL , NULL , NULL , '1','".date("Y-m-d h:i:s")."')");
				if ($sql){
					$_SESSION['alert']['berhasil'] ="Berhasil daftar";
					header("location:{$_ENV['base_url']}".'daftar'."");
				}else{
					$_SESSION['alert']['gagal'] ="Gagal daftar";
					header("location:{$_ENV['base_url']}".'daftar'."");
				}
				break;
			
			default:
				# code...
				break;
		}
 ?>