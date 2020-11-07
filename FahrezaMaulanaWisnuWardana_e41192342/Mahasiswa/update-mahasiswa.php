<?php
	include"mysql/config/koneksi.php";
	$nim = $_GET['nim'];
	$sql = mysqli_query($con,"SELECT * FROM mahasiswa WHERE nim='$nim'");
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="assets/css/style-dash.css">
	<link rel="stylesheet" type="text/css" href="assets/css/grid.css">
	<link rel="stylesheet" type="text/css" href="assets/font-aw/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="assets/datatables/datatables.min.css"/>
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="assets/datatables/datatables.min.js"></script>
	<script type="text/javascript" src="js/script-back.js"></script>
	<title>UPDATE Mahasiswa</title>
	<style type="text/css">
		.alert{
			position: relative;
		    padding: .75rem 1.25rem;
		    border: 1px solid transparent;
		}
		.alert-success{
		    color: #155724;
		    background-color: #d4edda;
		    border-color: #c3e6cb;
		}
		.alert-danger{
		    color: #721c24;
		    background-color: #f8d7da;
		    border-color: #f5c6cb;
		}
		.close{
		    float: right;
		    font-size: 1.5rem;
		    font-weight: 700;
		    line-height: 1;
		    color: #000;
		    text-shadow: 0 1px 0 #fff;
		    opacity: .5;
		}
		button.close {
		    padding: 0;
		    background-color: transparent;
		    border: 0;
		}
	</style>
</head>
<body>
	<?php 
		include"partials/header.php";
		include"partials/sidebar.php";
	 ?>
		<div id="content-wrapper">
			<div class="title">
				<h3>Ubah data</h3>
			</div>
			<div class="page-wrapper">
				<?php 
					while ($data = mysqli_fetch_array($sql)){
						?>
							<form method="POST" action="mysql/proses.php">
								<div class="col-12">
										<div class="form-group col-12">
											<div class="label">NIM</div>
											<div class="input">
												<input type="text" name="nim" class="form-control" id="nim" value="<?=$data['nim']?>">
											</div>
										</div>
										<div class="form-group col-12">
											<div class="label">Nama</div>
											<div class="input">
												<input type="text" name="nama" class="form-control"  value="<?=$data['nama']?>">
											</div>
										</div>
										<div class="form-group col-12">
											<div class="label">Alamat</div>
											<div class="input">
												<input type="text" name="alamat" class="form-control" value="<?=$data['alamat']?>">
											</div>
										</div>
										<div class="form-group col-12">
											<div class="label">Tanggal Lahir</div>
											<div class="input">
												<input type="date" name="tgl" class="form-control"  value="<?=$data['tgllahir']?>">
											</div>
										</div>
										<input type="hidden" name="aksi" value="update-mahasiswa">
										<input type="hidden" name="id" value="<?=$data['nim']?>">
								</div>
								<div class="col-12">
									<div class="form-group">
										<div class="input">
											<input type="submit" name="" class="form-control">
										</div>
									</div>
								</div>
							</form>
						<?php
					}
				 ?>
			</div>
		</div>
</body>
<script type="text/javascript">
	$(document).ready(function(){
		 $("#nim").keypress(function(){
			 if ($(this).val().length > 9){
			 	alert("oops maksimal 9 karakter");
			 	$(this).val("");
			 }
		 });
	});
</script>
</html>