<?php 
$koneksi = mysqli_connect("localhost","root","","login");
if (!$koneksi){
    die("Koneksi gagal:".mysqli_connect_error());
}
?>