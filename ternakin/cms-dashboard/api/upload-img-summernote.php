<?php 
	require_once"../../config/database.php";
	$path = $_SERVER['DOCUMENT_ROOT'].'/tugasWeb/ternakin/assets/image';
	if ($_FILES['file']['name']) {
		if (!$_FILES['file']['error']) {
			$name = md5(rand(100,200));
    		$ext = explode('.', $_FILES['file']['name']);
			$filename=$name.'.'.$ext[1];
			$destination = $path.'/summernote/'.basename($filename);
			$location = $_FILES['file']['tmp_name'];
			if (move_uploaded_file($location, $destination)) {
	            $url = $_ENV['base_url'].'/assets/image/summernote/'.basename($filename);
				echo $url;
			}else{
				echo"gagal";
			}
		}else{
			var_dump($_FILES);
			echo "oops ". $_FILES['file']['error'];
		}
	}
 ?>