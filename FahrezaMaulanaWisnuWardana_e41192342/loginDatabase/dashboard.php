<html>
<head>
	<link rel="stylesheet" type="text/css" href="assets/css/style-dash.css">
	<link rel="stylesheet" type="text/css" href="assets/css/grid.css">
	<link rel="stylesheet" type="text/css" href="assets/font-aw/css/font-awesome.min.css">
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="js/script-back.js"></script>
	<title></title>
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
	<?php session_start();
		if(isset($_SESSION['alert'])){
			?>
			<div class="alert alert-success">
				<?=$_SESSION['alert']['success'];?>
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
			</div>
			<?php
		}else{
			echo"";
		}
		session_unset();
		session_destroy(); 
	?>
		<header>
			<div class="navbar-title">
				<div class="toggle-nav">
					<i class="fa fa-bars fa-lg"></i>
				</div>
				<a href="#">Webku</a>
			</div>
			<div class="navbar-nav">
				<ul class="menu">
					<li><a href="index.php"> Logout</a></li>
				</ul>
			</div>
		</header>
		<div id="side-nav-box">
			<div class="profile-side-nav">
				<div class="profile-side">
						<div class="profile-side-img">
							<img src="image/profile.png">
						</div>
				</div>
				<div class="nav-side">
					<ul>
						<li><a href="#" class="toggle"><i class="fa fa-plus-circle"></i><span>Coba</span></a>
							<ul class="side-submenu">
								<li><a href="#">Tambah Coba</a></li>
							</ul>
						</li>
						<li><a href="#" class="toggle"><i class="fa fa-user-circle"></i><span>Profile</span></a></li>
						<li><a href="#" class="toggle"><i class="fa fa-newspaper-o"></i><span>Berita</span></a>
						</li>
						<li id="gear-list"><a href="#"><i class="fa fa-cog" id="gear"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
		<div id="content-wrapper">
			<div class="title">
				<h3>Tambah data</h3>
			</div>
			<div id="page-wrapper">
				<div class="col-8">
					<div class="form-group col-6">
						<div class="label">Text</div>
						<div class="input">
							<input type="text" name="" class="form-control">
						</div>
					</div>
					<div class="form-group col-3">
						<div class="label">Text</div>
						<div class="input">
							<input type="text" name="" class="form-control">
						</div>
					</div>
					<div class="form-group col-3">
						<div class="label">Text</div>
						<div class="input">
							<input type="number" name="" class="form-control">
						</div>
					</div>
					<div class="form-group col-6">
						<div class="label">Text</div>
						<div class="input">
							<input type="number" name="" class="form-control">
						</div>
					</div>
					<div class="form-group col-6">
						<div class="label">Text</div>
						<div class="input">
							<input type="number" name="" class="form-control">
						</div>
					</div>
				</div>
				<div class="col-4">
					<div class="form-group">
						<div class="label">Foto</div>
						<div class="input">
							<label class="custom-file" for="foto">Upload</label>
							<input type="file" name="" class="form-control" id="foto">
						</div>
					</div>
					<div id="preview-img">
						<img src="" id="img-live">
					</div>
				</div>
				<div class="col-8">
					<div class="form-group">
						<div class="input">
							<input type="submit" name="" class="form-control">
						</div>
					</div>
				</div>
			</div>
		</div>
</body>
<script type="text/javascript">
	$(document).ready(function(){
		$('.close').click(function(){
			$('.alert').fadeOut('slow');
		});
	});
</script>
</html>