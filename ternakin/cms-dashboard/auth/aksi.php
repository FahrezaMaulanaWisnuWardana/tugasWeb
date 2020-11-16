<?php 
	require_once"../../config/database.php";

	if (isset($_POST['aksi'])) {
		$aksi = $_POST['aksi'];

		switch ($aksi) {
			case 'login':
				$username = $_POST['username'];
				$password = $_POST['password'];
				$query = mysqli_query($con,"SELECT * FROM tb_users WHERE username ='".$username."' ");
				$data = mysqli_fetch_assoc($query);
				if (password_verify($password, $data['password'])){
					$_SESSION['user']['id_users'] = $data['id_users'];
					$_SESSION['user']['username'] = $data['username'];
					$_SESSION['user']['level'] = $data['level'];
					$_SESSION['alert']['berhasil'] = "Berhasil Login";
					header("location:{$_ENV['base_url']}".'cms-dashboard/home'."");
				}else{
					$_SESSION['alert']['gagal'] ="Oops Username atau Password salah";
					header("location:{$_ENV['base_url']}".'cms-dashboard'."");
				}

			break;
			case 'logout';
				session_destroy();
				header("location:{$_ENV['base_url']}".'cms-dashboard'."");
			break;
			default:
				header("HTTP/1.0 404 Not Found");
			break;
		}
	}
 ?>