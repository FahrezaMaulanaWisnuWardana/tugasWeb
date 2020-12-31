<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Mahasiswa</title>
</head>
<body>
    <header>
        <h3>Input Mahasiswa</h3>
    </header>
    <nav>
        <ul>
        <a href="tambah.php">+tambah</a>
        <table border="1" class="table">
        <tr>
            <th>No</th>
            <th>Nim</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Opsi</th>
        </tr>    
        <?php
        $nomor = 1;
        $data_mahasiswa = $con->prepare("SELECT * FROM mahasiswa");
        $data_mahasiswa->execute();
        $hasil = $data_mahasiswa->fetchAll();
        foreach($hasil as $data) {
        ?>
            <tr>
                <td><?php echo $nomor++; ?></td>
                <td><?php echo $data['nim']; ?></td>
                <td><?php echo $data['nama']; ?></td>
                <td><?php echo $data['alamat']; ?></td>
                <td>
                    <a href="edit.php?nim=<?php echo $data['nim']; ?>" name="edit">Edit</a>
                    <a href="hapus.php?nim=<?php echo $data['nim']; ?>" name="hapus">Hapus</a>
                </td>
            </tr>
            <?php
        } ?>
        </table>
        </ul>
    </nav>
</body>
</html>