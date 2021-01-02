<?php 
$koneksi = mysqli_connect("localhost:8080","root","","db_crud_web");

if(mysqli_connect_error()){
    echo "Koneksi Database Gagal : " . mysqli_connect_error();
}
?>