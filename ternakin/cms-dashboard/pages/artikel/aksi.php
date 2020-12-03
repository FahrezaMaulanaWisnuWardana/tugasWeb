<?php 
	require_once"../../../config/database.php";
	$aksi = $_POST['aksi'];
	switch ($aksi) {
		case 'tambah-artikel':
			if ($_FILES['foto']['name']!="") {
				$file = explode(".", $_FILES['foto']['name']);
				$foto = microtime(true).'.'.end($file);
				$arr = [
					'judul' => $_POST['judul'],
					'isi' => $_POST['content'],
					'foto' => $foto,
					'slug' => str_replace(" ", "-", str_shuffle(md5($_POST['judul']))),
					'id_users' => $_SESSION['user']['id_users'],
					'id_kategori' => implode(',', $_POST['kategori'])
				];
				$base_dir = $_SERVER['DOCUMENT_ROOT'].'/tugasWeb/ternakin/assets/image/artikel/';
				if (move_uploaded_file($_FILES['foto']['tmp_name'], $base_dir.$foto) ) {
					$sql = mysqli_query($con,"INSERT INTO tb_artikel VALUES(NULL,'".$arr['judul']."','".$arr['isi']."','".$arr['foto']."','".$arr['slug']."','".$arr['id_users']."','".$arr['id_kategori']."','".date("Y-m-d h:i:s")."')") or die(mysqli_error());
					($sql)?$_SESSION['alert']['berhasil'] ="Berhasil membuat artikel":$_SESSION['alert']['gagal'] ="Gagal membuat artikel";
					header("location:{$_ENV['base_url']}".'cms-dashboard/pages/artikel'."");
				}else{
					$_SESSION['alert']['gagal'] ="Oops ada sesuatu yang salah";
					header("location:{$_ENV['base_url']}".'cms-dashboard/pages/artikel'."");
				}	
			}else{
				$_SESSION['alert']['gagal'] ="Thumbnail wajib di isi";
				header("location:{$_ENV['base_url']}".'cms-dashboard/pages/artikel'."");
			}
			break;
		case 'update-artikel':
			if ($_FILES['foto']['name']!="") {
				
				$sqlArt = mysqli_query($con,"SELECT foto,id_artikel FROM tb_artikel WHERE id_artikel ='".$_POST['id_artikel']."'");
				$artSatu = mysqli_fetch_assoc($sqlArt);

				$file = explode(".", $_FILES['foto']['name']);
				$foto = microtime(true).'.'.end($file);
				$arr = [
					'id_artikel' => $_POST['id_artikel'],
					'judul' => $_POST['judul'],
					'isi' => $_POST['content'],
					'foto' => $foto,
					'slug' => str_replace(" ", "-", $_POST['judul']),
					'id_users' => $_SESSION['user']['id_users'],
					'id_kategori' => implode(',', $_POST['kategori'])
				];
				$base_dir = $_SERVER['DOCUMENT_ROOT'].'/tugasWeb/ternakin/assets/image/artikel/';
				if (move_uploaded_file($_FILES['foto']['tmp_name'], $base_dir.$foto) ) {
					unlink($base_dir.$artSatu['foto']);
					$sql = mysqli_query($con,"UPDATE tb_artikel SET judul='".$arr['judul']."', isi='".$arr['isi']."',foto='".$arr['foto']."',slug='".$arr['slug']."',id_kategori='".$arr['id_kategori']."' ") or die(mysqli_error());

					($sql)?$_SESSION['alert']['berhasil'] ="Berhasil ubah artikel":$_SESSION['alert']['gagal'] ="Gagal ubah artikel";
					header("location:{$_ENV['base_url']}".'cms-dashboard/pages/artikel'."");
				}else{
					$_SESSION['alert']['gagal'] ="Oops ada sesuatu yang salah";
					header("location:{$_ENV['base_url']}".'cms-dashboard/pages/artikel'."");
				}	
			}else{
				$arr = [
					'id_artikel' => $_POST['id_artikel'],
					'judul' => $_POST['judul'],
					'isi' => $_POST['content'],
					'slug' => str_replace(" ", "-", $_POST['judul']),
					'id_users' => $_SESSION['user']['id_users'],
					'id_kategori' => implode(',', $_POST['kategori'])
				];
				$sql = mysqli_query($con,"UPDATE tb_artikel SET judul='".$arr['judul']."', isi='".$arr['isi']."',slug='".$arr['slug']."',id_kategori='".$arr['id_kategori']."' WHERE id_artikel='".$arr['id_artikel']."' ") or die(mysqli_error());

				($sql)?$_SESSION['alert']['berhasil'] ="Berhasil ubah artikel":$_SESSION['alert']['gagal'] ="Gagal ubah artikel";
				header("location:{$_ENV['base_url']}".'cms-dashboard/pages/artikel'."");
			}
			break;
		case 'hapus-artikel':
			$id = $_POST['id_artikel'];
				$sql = mysqli_query($con,"DELETE FROM tb_artikel WHERE id_artikel='".$id."'");
				($sql)?$_SESSION['alert']['berhasil'] ="Berhasil hapus artikel":$_SESSION['alert']['gagal'] ="Gagal hapus artikel";
				header("location:{$_ENV['base_url']}".'cms-dashboard/pages/artikel'."");
			break;
		case 'tambah-kategori':
			$kategori = $_POST['kategori'];
			$file = explode(".", $_FILES['foto']['name']);
			$foto = microtime(true).'.'.end($file);
			$base_dir = $_SERVER['DOCUMENT_ROOT'].'/tugasWeb/ternakin/assets/image/kategori/';
			if ($_FILES['foto']['name']!="") {
				if (move_uploaded_file($_FILES['foto']['tmp_name'], $base_dir.$foto) ) {
					$sql = mysqli_query($con,"INSERT INTO tb_kategori VALUES(NULL,'".$kategori."')") or die(mysqli_error($con));
					if ($sql) {
						$last = $con->insert_id;
						$sqlImgKat = mysqli_query($con,"INSERT INTO tb_kategori_img VALUES('".$last."','".$foto."')") or die(mysqli_error($con));
						($sqlImgKat)? $_SESSION['alert']['berhasil'] ="Berhasil tambah kategori" : $_SESSION['alert']['gagal'] ="Oops ada yang salah";
					}
				}else{
					$_SESSION['alert']['gagal'] ="Gagal tambah kategori";
				}
			}else{
				$sql = mysqli_query($con,"INSERT INTO tb_kategori VALUES(NULL,'".$kategori."')") or die(mysqli_error($con));
					if ($sql) {
						($sql)? $_SESSION['alert']['berhasil'] ="Berhasil tambah kategori" : $_SESSION['alert']['gagal'] ="Oops ada yang salah";
					}
			}
			header("location:{$_ENV['base_url']}".'cms-dashboard/pages/artikel/kategori-artikel'."");
			break;
		case 'update-kategori':
			$id = $_POST['id_kategori'];
			$kategori = $_POST['kategori'];

			$sqlImgKat = mysqli_query($con,"SELECT * FROM tb_kategori_img WHERE id_kategori='".$id."'");
			$dataImg = mysqli_fetch_assoc($sqlImgKat);

			$file = explode(".", $_FILES['foto']['name']);
			$foto = microtime(true).'.'.end($file);
			$base_dir = $_SERVER['DOCUMENT_ROOT'].'/tugasWeb/ternakin/assets/image/kategori/';


				if ($_FILES['foto']['name']!=""){
					if (move_uploaded_file($_FILES['foto']['tmp_name'], $base_dir.$foto)) {
						unlink($base_dir.$dataImg['img_kategori']);
						$sql = mysqli_query($con,"UPDATE tb_kategori SET kategori='".$kategori."' WHERE id_kategori='".$id."'");
						if ($sql) {
							$sqlImgKat = mysqli_query($con,"UPDATE tb_kategori_img SET img_kategori='".$foto."' WHERE id_kategori='".$id."' ") or die(mysqli_error($con));
							($sqlImgKat)?$_SESSION['alert']['berhasil'] ="Berhasil ubah kategori":$_SESSION['alert']['gagal'] ="Oops ada yang salah";
						}
					}
				}else{
					$sql = mysqli_query($con,"UPDATE tb_kategori SET kategori='".$kategori."' WHERE id_kategori='".$id."'");
					($sql)?$_SESSION['alert']['berhasil'] ="Berhasil ubah kategori":$_SESSION['alert']['gagal'] ="Gagal ubah kategori";
				}
				header("location:{$_ENV['base_url']}".'cms-dashboard/pages/artikel/kategori-artikel'."");
			break;
		case 'hapus-kategori':
			$id = $_POST['id_kategori'];
			$sql = mysqli_query($con,"DELETE FROM tb_kategori WHERE id_kategori='".$id."'");
			$sqlImgKat = mysqli_query($con,"SELECT * FROM tb_kategori_img WHERE id_kategori='".$id."'");
			$dataImg = mysqli_fetch_assoc($sqlImgKat);
			$base_dir = $_SERVER['DOCUMENT_ROOT'].'/tugasWeb/ternakin/assets/image/kategori/';
				if ($sql) {
					unlink($base_dir.$dataImg['img_kategori']);
					$sqlImg = mysqli_query($con,"DELETE FROM tb_kategori_img WHERE id_kategori='".$id."'");
					($sqlImg)?$_SESSION['alert']['berhasil'] ="Berhasil hapus kategori":$_SESSION['alert']['gagal'] ="Gagal hapus kategori";
				}
				header("location:{$_ENV['base_url']}".'cms-dashboard/pages/artikel/kategori-artikel'."");
			break;
		default:
			header("HTTP/1.0 404 Not Found");
			break;
	}
 ?>