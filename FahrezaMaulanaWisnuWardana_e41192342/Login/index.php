<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="assets/font-aw/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/login.css">
	<style type="text/css">
		.alert{
			position: relative;
		    padding: .75rem 1.25rem;
		    border: 1px solid transparent;
		}
		.alert-danger{
		    color: #721c24;
		    background-color: #f8d7da;
		    border-color: #f5c6cb;
		}
	</style>
</head>
<body>
	<div class="container">
	<?php session_start();
		if(isset($_SESSION['alert'])){
			?>
			<div class="alert alert-danger">
				<?=$_SESSION['alert'];?>
			</div>
			<?php
		}else{
			echo"";
		}
		session_unset();
		session_destroy(); 
	?>
			<div class="left">
				<div class="intro">
					<div class="desc">
						<h3>Halaman Login</h3>
						<p>Fahreza Maulana WW</p>
					</div>
				</div>
			</div>
			<div class="right">
			<div class="head">
				<h3>Login</h3>
			</div>
				<form id="box-login" method="POST" action="act_login.php"  autocomplete="off">
					<label><b><i>U</i></b>sername </label>
						<div class="user">
							<input type="text" name="username" placeholder="Username">
						</div>
					<label><b><i>P</i></b>assword </label>
						<div class="user1">
							<input type="password" name="password" placeholder="Password">
						</div>
					<input type="submit" value="Masuk" name="submit">
				</form>
			</div>
		
		</div>
</body>
</html>