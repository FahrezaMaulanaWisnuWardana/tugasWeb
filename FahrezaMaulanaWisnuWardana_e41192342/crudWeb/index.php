<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		*{
			margin:0;
			padding: 0;
			box-sizing: border-box;
		}
		table{
			border-collapse: collapse;
  			border: 1px solid black;
		}
		tr, td, th{
			padding:10px;
  			border: 1px solid black;
		}
	</style>
</head>
<body>
	<table>
		<thead>
			<tr>
				<th>No</th><th>Nama</th><th>Alamat</th><th>Pekerjaan</th><th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				include"koneksi.php";
				$sql = mysqli_query($con,"SELECT * FROM tb_user");
				$no = 1;
				while ($data = mysqli_fetch_array($sql)) {
					?>
					<tr>
						<td><?=$no++?></td>
						<td><?=$data['nama']?></td>
						<td><?=$data['alamat']?></td>
						<td><?=$data['pekerjaan']?></td>
						<td>
							<a href="update.php?id=<?=$data['id']?>">Update</a>
							<form method="POST" action="aksi.php" style="margin-top: 10px;">
								<button type="submit" name="aksi" value="hapus">Hapus</button>
								<input type="hidden" name="id" value="<?=$data['id']?>">
							</form>
						</td>
					</tr>
					<?php
				}
			 ?>
		</tbody>
	</table>
	<a href="input.php">Tambah data</a>
</body>
</html>