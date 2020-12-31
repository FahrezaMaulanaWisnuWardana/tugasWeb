<?php 
    include "koneksi.php";
    if(isset($_GET['nim'])){
    $data_mahasiswa=$con->prepare("DELETE from mahasiswa where nim=" . $_GET['nim']);
    $data_mahasiswa->execute();
    header('location:index.php');
    }
?>