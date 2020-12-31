<?php 
	$title="Home";
	require_once"library.php";
	require_once"partials/header.php";
	$sql = "SELECT * FROM mahasiswa";
	$pdo_statement = $con->prepare($sql);
	$pdo_statement->execute();
	$result = $pdo_statement->fetchAll();
 ?>
 <style type="text/css">
 	table , th , tr ,td {
 		border-collapse: collapse;
 		border: 1px solid black;
 		width: 60%;
 		margin:50px auto;
 		padding:5px;
 	}
 	.form{
 		width: 50%;
 		margin:20px auto;
 	}
 	.form > input ,.form > button{
 		display: block;
 		width: 100%;
 		margin:10px;
 	}
 </style>
</head>
<body>
	<form method="POST" action="aksi.php" class="form">
		<input type="text" name="nim">
		<input type="text" name="nama">
		<input type="text" name="alamat">
		<input type="date" name="tgl">
		<button type="submit" value="tambah" name="aksi">Tambah data</button>
	</form>
	<table>
		<thead>
			<th>Nim</th>
			<th>Nama</th>
			<th>Alamat</th>
			<th>Tanggal Lahir</th>
			<th>Aksi</th>
		</thead>
		<tbody>
			<?php 
				if (!empty($result)){
					foreach ($result as $data) {	
					?>
					<tr>
						<td><?=$data['nim']?></td>
						<td><?=$data['nama']?></td>
						<td><?=$data['alamat']?></td>
						<td><?=$data['tgllahir']?></td>
						<td style="text-align: center;">
							<form method="POST" action="aksi.php">
								<input type="hidden" name="nim" value="<?=$data['nim']?>">
									<button name="aksi" value="hapus" style="display: inline;">Hapus</button>
							</form>
							<a href="update-form.php?nim=<?=$data['nim']?>">Edit</a>
						</td>
					</tr>
					<?php
					}
				}else{
					?>
					<tr>
						<td colspan="6" style="text-align: center;">Data Kosong</td>
					</tr>
					<?php
				}
			?>
		</tbody>
	</table>
</body>
<?php require_once"partials/footer.php";?>