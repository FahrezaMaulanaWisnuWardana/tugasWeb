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
    if(!isset($_GET['nim'])){
        die("Error: nim Tidak Dimasukkan");
    }
    $data_mahasiswa = $con->prepare("SELECT * FROM mahasiswa WHERE nim = :nim");
    $data_mahasiswa->bindParam(":nim", $_GET['nim']);
    $data_mahasiswa->execute();
    if($data_mahasiswa->rowCount() == 0){
        die("Error: nim Tidak Ditemukan");
    }else{
        $data = $data_mahasiswa->fetch();
    }
    if(isset($_POST['Simpan'])){
        $nama = htmlentities($_POST['nama']);
        $alamat = htmlentities($_POST['alamat']);
        $data_mahasiswa = $con->prepare("UPDATE mahasiswa SET nama=:nama,alamat=:alamat WHERE nim=:nim");
        $data_mahasiswa->bindParam(":nama", $nama);
        $data_mahasiswa->bindParam(":alamat", $alamat);
        $data_mahasiswa->bindParam(":nim", $_GET['nim']);
        $data_mahasiswa->execute();
        header("location: index.php");
    }
    ?>
    <form action="" method="POST">
        <fieldset>
            <p>
                <p><label for="nama">NIM: </label>
                <input type="text" name="nim" value="<?php echo $data['nim']?>" readonly="">
            </p>
            <p>
                <label for="nama">Nama: </label>
                <input type="text" name="nama" value="<?php echo $data['nama']?>">
            </p>
            <p>
                <label for="alamat">Alamat: </label>
                <textarea name="alamat"><?php echo $data['alamat']?></textarea>
            <p>
                <input type="submit" value="Simpan" name="Simpan">
            </p>
        </fieldset>
    </form>
</body>
</html>