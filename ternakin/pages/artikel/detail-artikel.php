<?php 
	include"../../config/database.php";
	$slug = explode("/", $_GET['slug']);
	$sql = mysqli_query($con,"SELECT * FROM tb_artikel WHERE slug='".$slug[1]."'");
	$data = mysqli_fetch_assoc($sql);
  	$title=$data['judul'];
  	include"../../templates/header.php";
 ?>
</head>
    <?php 
      include"../../partials/navbar.php"; 
    ?>
    <div class="container my-5">
      <div class="row">
  		<div class="col-12 d-flex justify-content-between">
			<h6><?=$data['judul']?></h6>
			<h6><?= strftime('%d %B %Y', strtotime($data['created_at']))?> </h6>
  		</div>
      	<div class="col-12">
      		<?=$data['isi']?>
      	</div>
      </div>
    </div>
    <?php include"../../partials/footer.php"; ?>
  </body>
    <?php include"../../templates/footer.php"; ?>
</html>