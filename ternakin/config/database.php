<?php 
	require_once 'checker.php';
	$con = mysqli_connect($_ENV['DB_HOST'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], $_ENV['DB_DATABASE']);
	session_start();
	echo (mysqli_connect_errno())?"Koneksi database gagal : " . mysqli_connect_error():'';
?>