<?php 
	$con = mysqli_connect('localhost','root','','db_crud');
	if ($con) {
	}else{
		echo mysqli_connect_error();
	}
 ?>