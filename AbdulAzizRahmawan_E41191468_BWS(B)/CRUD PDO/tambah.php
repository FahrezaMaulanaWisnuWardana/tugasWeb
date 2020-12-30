<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mahasiswa</title>
</head>
<body>
    <header>
        <h3>Edit Data Mahasiswa</h3>
    </header>
    <?php 
        if(!empty($_POST["Simpan"])) {
            $nim = $_POST['nim'];
            $nama = $_POST['nama'];
            $alamat= $_POST['alamat'];
            $data_mahasiswa = $con->prepare("INSERT INTO mahasiswa VALUES ('$nim','$nama','$alamat')");
            $data_mahasiswa->execute();
            header("location:index.php");
        }
    ?>
    <form action="" method="POST">
        <fieldset>
            <p>
                <p><label for="nama">NIM: </label>
                <input type="text" name="nim" value="">
            </p>
            <p>
                <label for="nama">Nama: </label>
                <input type="text" name="nama" placeholder="nama" >
            </p>
            <p>
                <label for="alamat">Alamat: </label>
                <textarea name="alamat"></textarea>
            <p>
                <input type="submit" value="Simpan" name="Simpan">
            </p>
        </fieldset>
    </form>
</body>
</html>