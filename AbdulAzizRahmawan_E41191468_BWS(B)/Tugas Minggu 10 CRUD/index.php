<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="judul">
        <h1>Membuat CRUD dengan PHP dan MySQL</h1>
        <h2>Menampilkan data dari Database</h2>
    </div>
    <br>
    <?php
    if (isset($_GET['pesan'])) {
        $pesan = $_GET['pesan'];
        if ($pesan == "input") {
            # code...
            echo "data berhasi di input";
        } elseif ($pesan == "update") {
            # code...
            echo "data berhasil di upudate";
        } elseif ($pesan == "hapus") {
            # code...
            echo "data berhasil di hapus";
        }
    }
    ?>
    <br>
    <a href="input.php" class="tombol">+ Tambah Data Baru</a>
    <h3>Data User</h3>
    <table border="1" class="table">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Pekerjaan</th>
            <th>Opsi</th>
        </tr>    
        <?php
        include "koneksi.php";
        $query = mysqli_query($koneksi,"SELECT * FROM user");
        $nomor = 1;
        while ($data = mysqli_fetch_array($query)) {
        ?>
            <tr>
                <td><?php echo $nomor++; ?></td>
                <td><?php echo $data['nama']; ?></td>
                <td><?php echo $data['alamat']; ?></td>
                <td><?php echo $data['pekerjaan']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $data['id']; ?>" class="edit">Edit</a>
                    <a href="hapus.php?id=<?php echo $data['id']; ?>" class="hapus">Hapus</a>
                </td>
            </tr>
            <?php
        } ?>
    </table>
</body>
</html>