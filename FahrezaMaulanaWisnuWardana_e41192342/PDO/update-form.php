<?php 
	$title="Home";
	require_once"library.php";
	require_once"partials/header.php";
	$sql = "SELECT * FROM mahasiswa WHERE nim='".$_GET['nim']."'";
	$pdo_statement = $con->prepare($sql);
	$pdo_statement->execute();
	$result = $pdo_statement->fetch(PDO::FETCH_ASSOC);
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
		<input type="hidden" name="nim_now" value="<?=$result['nim']?>">
		<input type="text" name="nim" value="<?=$result['nim']?>">
		<input type="text" name="nama" value="<?=$result['nama']?>">
		<input type="text" name="alamat" value="<?=$result['alamat']?>">
		<input type="date" name="tgl" value="<?=$result['tgllahir']?>">
		<button type="submit" value="update" name="aksi">Edit data</button>
	</form>
</body>
<?php require_once"partials/footer.php";?>