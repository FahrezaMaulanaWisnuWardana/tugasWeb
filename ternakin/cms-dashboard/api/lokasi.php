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
		case'check-kota-id':
			$sql = mysqli_query($con,"SELECT * FROM tb_kota WHERE id_provinsi='".$id."' ORDER BY id_kota DESC LIMIT 1");
			$sqlProv = mysqli_query($con,"SELECT * FROM tb_provinsi WHERE id_provinsi='".$id."'");
			if (mysqli_num_rows($sql)>0) {
				$data = mysqli_fetch_assoc($sql);
				$arr = array('id_kota' => intval($data['id_kota']));
			}else{
				$data = mysqli_fetch_assoc($sqlProv);
				$arr = array('id_kota' => "".strval($data['id_provinsi'])."0");
			}
			echo json_encode($arr);
			break;
		case'edit-check-kota-id':
			$sql = mysqli_query($con,"SELECT * FROM tb_kota WHERE id_provinsi='".$id."' ORDER BY id_kota DESC LIMIT 1");
			$sqlProv = mysqli_query($con,"SELECT * FROM tb_provinsi WHERE id_provinsi='".$id."'");
			if (mysqli_num_rows($sql)>0) {
				$data = mysqli_fetch_assoc($sql);
				if ($data['id_kota']==$_POST['idKota']) {
					$arr = array('id_kota' => intval($_POST['idKota']));
				}else{
					$arr = array('id_kota' => intval($data['id_kota']));
				}
			}else{
				$data = mysqli_fetch_assoc($sqlProv);
				$arr = array('id_kota' => "".strval($data['id_provinsi'])."0");
			}
				echo json_encode($arr);
			break;
		default:
			header("HTTP/1.0 404 Not Found");
			break;
	}
 ?>