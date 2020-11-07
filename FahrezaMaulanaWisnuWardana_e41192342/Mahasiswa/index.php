<?php include"mysql/config/koneksi.php"; ?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="assets/css/style-dash.css">
	<link rel="stylesheet" type="text/css" href="assets/css/grid.css">
	<link rel="stylesheet" type="text/css" href="assets/font-aw/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="assets/datatables/datatables.min.css"/>
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="assets/datatables/datatables.min.js"></script>
	<script type="text/javascript" src="js/script-back.js"></script>
	<title>Home | Tambah Mahasiswa</title>
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
				<h3>Tambah data</h3>
			</div>
			<div class="page-wrapper">
				<?php session_start();
					if(isset($_SESSION['alert-salah'])){
						?>
						<div class="alert alert-danger">
							<?=$_SESSION['alert-salah'];?>
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
						</div>
						<?php
					}else if(isset($_SESSION['alert'])){
						?>
							<div class="alert alert-success">
								<?=$_SESSION['alert'];?>
								  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								    <span aria-hidden="true">&times;</span>
								  </button>
							</div>
						<?php
					}
					session_unset();
					session_destroy(); 
				?>
				<form method="POST" action="mysql/proses.php">
					<div class="col-12">
							<div class="form-group col-12">
								<div class="label">NIM</div>
								<div class="input">
									<input type="text" name="nim" id="nim" class="form-control">
								</div>
							</div>
							<div class="form-group col-12">
								<div class="label">Nama</div>
								<div class="input">
									<input type="text" name="nama" class="form-control">
								</div>
							</div>
							<div class="form-group col-12">
								<div class="label">Alamat</div>
								<div class="input">
									<input type="text" name="alamat" class="form-control">
								</div>
							</div>
							<div class="form-group col-12">
								<div class="label">Tanggal Lahir</div>
								<div class="input">
									<input type="date" name="tgl" class="form-control">
								</div>
							</div>
							<input type="hidden" name="aksi" value="tambah-mahasiswa">
					</div>
					<div class="col-12">
						<div class="form-group">
							<div class="input">
								<input type="submit" name="" class="form-control">
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="title">
				<h3>Data mahasiswa</h3>
			</div>
			<div class="page-wrapper">
				<div class="table">
					<table class="text-center display" id="myTable" style="width:100%">
						<thead>
							<tr>
								<th>NIM</th><th>Nama</th><th>Alamat</th><th>Tanggal Lahir</th><th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								$mysql = mysqli_query($con,"select * from mahasiswa");
								while ($data = mysqli_fetch_array($mysql)) {
									?>
										<tr>
											<td><?=$data['nim']?></td>
											<td><?=$data['nama']?></td>
											<td><?=$data['alamat']?></td>
											<td><?=$data['tgllahir']?></td>
											<td>
												<a class="btn btn-primary" href="update-mahasiswa.php?nim=<?=$data['nim']?>"><i class="fa fa-pencil"></i></a>
												<form method="POST" action="mysql/proses.php" style="margin-top: 5px;">
													<button class="btn btn-danger" type="submit" value="<?=$data['nim']?>" name="nim" onclick="return confirm('Yakin mau hapus data?')">
														<i class="fa fa-trash"></i>
													</button>
													<input type="hidden" name="aksi" value="hapus-mahasiswa">
												</form>
											</td>
										</tr>
									<?php
								}
							 ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
</body>
<script type="text/javascript">
	$(document).ready(function(){
		$('.close').click(function(){
			$('.alert').fadeOut('slow');
		});
		 $('#myTable').DataTable();
		 $("#nim").keypress(function(){
			 if ($(this).val().length > 9){
			 	alert("oops maksimal 9 karakter");
			 	$(this).val("");
			 }
		 });

	});
</script>
</html>