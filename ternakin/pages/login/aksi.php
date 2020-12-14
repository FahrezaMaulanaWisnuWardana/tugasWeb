<?php 
	require_once"../../config/database.php";
	$aksi = $_POST['aksi'];

	switch ($aksi) {
		case 'masuk':
			$email = $_POST['email'];
			$password = $_POST['password'];
			$sql = mysqli_query($con,"SELECT * FROM tb_peternak WHERE email='$email'");
			$data = mysqli_fetch_assoc($sql);
			if (password_verify($password, $data['password'])) {
				
                $_SESSION['user']['id'] = $data['id_peternak']; 
                $_SESSION['user']['nama'] = $data['nama_lengkap'];
				header("location:{$_ENV['base_url']}".'profile'."");
			}else{
				$_SESSION['alert']['gagal'] ="Gagal Login Username atau Password anda salah";
				header("location:{$_ENV['base_url']}".'login'."");
			}
			break;
		
		default:
			header("HTTP/1.0 404 Not Found");
			break;
	}
 ?>