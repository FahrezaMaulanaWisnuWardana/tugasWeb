<?php 
	session_start();
	session_destroy();
	session_unset();
	session_start();
	$_SESSION['alert']['berhasil'] ="Berhasil Keluar";
	header("location:{$_ENV['base_url']}".'login'."");
 ?>