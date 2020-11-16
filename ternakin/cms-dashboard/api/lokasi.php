<?php 
	require_once"../../config/database.php";
	header('Content-Type: application/json');
	$aksi = $_POST['aksi'];
	$id = $_POST['id'];
	switch ($aksi) {
		case 'provinsi':
			$sql = mysqli_query($con, "SELECT * FROM tb_provinsi WHERE id_provinsi='".$id."'");
			while ($data = mysqli_fetch_array($sql)) {
				$arr[] = json_encode($data);
			}
			break;
		case 'kota':
			$sql = mysqli_query($con, "SELECT * FROM tb_kota WHERE id_provinsi='".$id."'");
			while ($data = mysqli_fetch_array($sql)) {
				$arr[] = array(
					'id_kota' =>$data['id_kota'] ,
					'id_provinsi' => $data['id_provinsi'],
					'nama'=>$data['nama_kota']
				);
			}
			$json = array(
				'item' => $arr,
			);
				echo json_encode($json);
			break;
		default:
			header("HTTP/1.0 404 Not Found");
			break;
	}
 ?>