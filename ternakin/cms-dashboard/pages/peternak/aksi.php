<?php 
	require_once"../../../config/database.php";
	$aksi = $_POST['aksi'];
	switch ($aksi) {
		case 'hapus-peternak':
			$id = $_POST['id_peternak'];
			$sql = mysqli_query($con,"DELETE FROM tb_peternak WHERE id_peternak='".$id."'") or die(mysqli_error($con));
			($sql)?$_SESSION['alert']['berhasil'] ="Berhasil hapus peternak":$_SESSION['alert']['gagal'] ="Gagal hapus peternak";
			header("location:{$_ENV['base_url']}".'cms-dashboard/pages/peternak'."");
			break;
		
		default:
			header("HTTP/1.0 404 Not Found");
			break;
	}
 ?>