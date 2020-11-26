<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		input , label{
			display: block;
		}
	</style>
</head>
<body>
	<?php
		include"koneksi.php";
		$sql = mysqli_query($con,"SELECT * FROM tb_user WHERE id='".$_GET['id']."'");
		$data = mysqli_fetch_assoc($sql);
	?>
	<h1>Update Data</h1>
	<form method="POST" action="aksi.php">
		<input type="hidden" name="id" value="<?=$data['id']?>">
		<label>Nama</label>
		<input type="text" name="nama" value="<?=$data['nama']?>">
		<label>Alamat</label>
		<textarea name="alamat"><?=$data['alamat']?></textarea>
		<label>Pekerjaan</label>
		<input type="text" name="pekerjaan" value="<?=$data['pekerjaan']?>">
		<button type="submit" name="aksi" value="update" style="margin-top: 10px;">Update</button>
	</form>
</body>
</html>