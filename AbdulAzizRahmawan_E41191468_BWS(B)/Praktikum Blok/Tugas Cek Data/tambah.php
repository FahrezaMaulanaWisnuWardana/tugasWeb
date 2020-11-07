<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
$nim = $_POST['nim'];
$nama = $_POST['nama'];
$lahir = $_POST['lahir'];
$agama = $_POST['agama'];
$username= $_POST['username'];
$password = $_POST['password'];
 
// menginput data ke database
mysqli_query($koneksi,"insert into mahasiswa values('$nim','$nama','$lahir','$agama','$username','$password')");
 
// mengalihkan halaman kembali ke index.php
header("location:mahasiswa.php");
 
?>