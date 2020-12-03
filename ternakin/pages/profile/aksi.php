<?php 
	require_once"../../config/database.php";
	$aksi = $_POST['aksi'];
	$id = $_SESSION['user']['id'];
	switch ($aksi) {
		case 'gabung':
			$sql = mysqli_query($con,"SELECT * FROM tb_peternak WHERE id_peternak='".$id."'");
			$data = mysqli_fetch_assoc($sql);
			if (is_array($data)) {
				foreach ($data as $key => $value) {
					if ($value==NULL || empty($value) || is_null($value) || $value=="") {
						$_SESSION['alert']['gagal'] ="Silahkan lengkapi data diri anda";
						header("location:{$_ENV['base_url']}profile");
						return false;
					}
				}
				
				if (is_null($data)) {
						$_SESSION['alert']['gagal'] ="Silahkan lengkapi data diri anda";
						header("location:{$_ENV['base_url']}profile");
				}else{
					$sql = mysqli_query($con,"UPDATE tb_peternak SET level='2' WHERE id_peternak='".$id."'");
					$_SESSION['alert']['berhasil'] ="Berhasil bergabung menjadi penjual";
					header("location:{$_ENV['base_url']}profile");
				}
			}
			break;
		case 'edit-profile':
					$sql = mysqli_query($con,"UPDATE tb_peternak SET 
						nama_lengkap='".$_POST['nama']."',
						email='".$_POST['email']."',
						no_hp='".$_POST['no_hp']."',
						alamat='".$_POST['alamat']."',
						no_rek='".$_POST['no_rek']."',
						id_provinsi= '".$_POST['provinsi']."',
						id_kota='".$_POST['kota']."'
						WHERE id_peternak='".$id."'");
					if ($sql) {
						$_SESSION['alert']['berhasil'] ="Berhasil update profile";
						header("location:{$_ENV['base_url']}profile");
					}else{
						$_SESSION['alert']['gagal'] ="Gagal update profile";
						header("location:{$_ENV['base_url']}profile");
					}
			break;
		case 'tambah-produk':
			$total = count($_FILES['foto']['name']);
			$dataFile = implode(',', $_FILES['foto']['name']);
			$nama = $_POST['nama_produk'];
			$jenis = $_POST['jenis'];
			$jumlah = $_POST['jumlah'];
			$harga = $_POST['harga'];
			$peternak = $_SESSION['user']['id'];
			$deskripsi = $_POST['deskripsi'];
			$catatan = $_POST['catatan'];
			$provinsi = $_POST['provinsi'];
			$kota = $_POST['kota'];
			$alamat = $_POST['alamat'];
			for ($i=0; $i <$total ; $i++) {
				$tmp = $_FILES['foto']['tmp_name'][$i];
				$name = $_FILES['foto']['name'][$i];
				$base_dir = $_SERVER['DOCUMENT_ROOT']."/tugasWeb/ternakin/assets/image/produk/".$id."/";
				if (!is_dir($base_dir)){
					mkdir($base_dir);
				}
				$upload = move_uploaded_file($tmp, $base_dir.basename($name));
			}
				if ($upload) {
					$sql = mysqli_query($con,"INSERT INTO tb_produk VALUES(NULL,'".$dataFile."','".$nama."','".$jenis."','".$jumlah."','".$harga."','".$peternak."','".$deskripsi."','".$catatan."','".$provinsi."','".$kota."','".$alamat."','".date("Y-m-d h:i:s")."')") or die(mysqli_error($con));
					if ($sql) {
						$_SESSION['alert']['berhasil'] ="Berhasil tambah produk";
					}else{
						$_SESSION['alert']['gagal'] ="Gagal tambah produk";
					}
				}else{
						$_SESSION['alert']['gagal'] ="Gagal tambah produk";
				}
						header("location:{$_ENV['base_url']}profile");
			break;
		default:
			# code...
			break;
	}
 ?>