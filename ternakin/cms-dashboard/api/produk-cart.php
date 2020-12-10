<?php 	
	require_once"../../config/database.php";
	header('Content-Type: application/json');
	$aksi = $_POST['aksi'];
	switch ($aksi) {
		case 'all-produk':
			$sql = mysqli_query($con, "SELECT * FROM tb_produk LEFT JOIN tb_produk_jenis ON tb_produk_jenis.id_jenis_produk = tb_produk.id_jenis_produk");
			while ($data = mysqli_fetch_array($sql)) {
				$img = explode(',', $data['foto_produk']);
				$arr[] =array(
					'id'=>$data['id_hewan'],
					'id_peternak' => $data['id_peternak'],
					'img'=>$img[0],
					'jenis'=>$data['nama_jenis_produk'],
					'nama'=>$data['nama_produk'],
					'harga'=>$data['harga'],
				);
			}
			$json = array('data' => $arr);
				echo json_encode($arr);
			break;
		
		default:
			# code...
			break;
	}
 ?>