<?php
session_start();
$con = mysqli_connect("localhost","root","","db_login");
$aksi = $_POST['aksi'];
switch ($aksi) {
	case 'masuk':
		$username=$_POST['username'];
		$password = $_POST['password'];
		$sql = mysqli_query($con , "SELECT * FROM user WHERE username ='".$username."'") or die(mysqli_error($con));
		$data = mysqli_fetch_assoc($sql);
		if (password_verify($password, $data['password'])) {
			$_SESSION['alert']['success'] = "Berhasil login";
			$_SESSION['user']['nama'] = $data['nama'];
			$_SESSION['user']['username'] = $data['username'];
			header("location:dashboard.php");
		}else{
			$_SESSION['alert']['danger'] = "Oops gagal login";
			header("location:index.php");
		}
		break;
	case 'daftar':
		$nama=$_POST['nama'];
		$username=$_POST['username'];
		$password=password_hash($_POST['password'], PASSWORD_DEFAULT);
		$sql = mysqli_query($con,"INSERT INTO user VALUES(NULL,'$username','$password','$nama')") or die(mysqli_error($con));
		if ($sql) {
			$_SESSION['alert']['success'] = "Berhasil daftar";
			header("location:register.php");
		}else{
			$_SESSION['alert']['danger'] = "Oops gagal daftar";
			header("location:register.php");
		}
		break;
	
	default:
		break;
}
?>