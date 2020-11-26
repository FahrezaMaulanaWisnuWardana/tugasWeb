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
	<h1>Tambah Data</h1>
	<form method="POST" action="aksi.php">
		<label>Nama</label>
		<input type="text" name="nama">
		<label>Alamat</label>
		<textarea name="alamat"></textarea>
		<label>Pekerjaan</label>
		<input type="text" name="pekerjaan">
		<button type="submit" name="aksi" value="tambah" style="margin-top: 10px;">Tambah</button>
	</form>
</body>
</html>