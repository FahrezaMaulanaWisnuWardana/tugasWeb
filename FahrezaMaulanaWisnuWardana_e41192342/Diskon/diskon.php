<?php 
	$harga = intval($_POST['harga']);
	$diskon = $_POST['diskon'];

	$hasil = $harga * ($diskon/100);
	session_start();
	$_SESSION['hasil']=$harga - $hasil;
	header('location:index.php');
 ?>