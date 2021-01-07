<?php 	
	require_once"../../config/database.php";
	header('Content-Type: application/json');
	$aksi = $_POST['aksi'];
	switch ($aksi) {
		case 'all-produk':
			$sql = mysqli_query($con, "SELECT * FROM tb_produk LEFT JOIN tb_produk_jenis ON tb_produk_jenis.id_jenis_produk = tb_produk.id_jenis_produk");
			while ($data = mysqli_fetch_array($sql)) {
				$img = explode(',', $data['foto_produk']);
				if ($data['id_peternak'] == $_SESSION['user']['id']) {
					$arr[] = array('null'=>NULL);
				}else{
					$arr[] =array(
						'id'=>intval($data['id_hewan']),
						'id_peternak' => $data['id_peternak'],
						'img'=>$img[0],
						'jenis'=>$data['nama_jenis_produk'],
						'nama'=>$data['nama_produk'],
						'harga'=>$data['harga'],
					);
				}
			}
			$json = array('data' => $arr);
				echo json_encode($arr);
			break;
		case 'proses-produk':
				$total = count($_POST['produk']);
				$sql = mysqli_query($con,"SELECT COUNT(DISTINCT(kd_transaksi)) as jml FROM tb_transaksi") or die(mysqli_error($con));
				$jml = mysqli_num_rows($sql);
				if ($jml < 1) {
					for ($i=0; $i < $total; $i++) { 
						$arr[] = array(
							'id_transaksi'=>NULL,
							'kd_transaksi'=>"TR01",
							'kd_tr_peternak'=>"TR01.".$_POST['peternak'][$i],
							'id_hewan'=>$_POST['produk'][$i],
							'id_peternak'=>$_SESSION['user']['id'],
							'kurir'=>NULL,
							'no_resi'=>NULL,
							'status'=>1
						);
						$arrid[] = $_POST['produk'][$i];
					}
				}else{
					while($data = mysqli_fetch_array($sql)){
						$num = intval($data['jml'])+1;
					}
						for ($i=0; $i < $total; $i++) { 
							$arr[] = array(
								'id_transaksi'=>NULL,
								'kd_transaksi'=>"TR0".$num,
								'kd_tr_peternak'=>"TR0".$num.".".$_POST['peternak'][$i]."",
								'id_hewan'=>$_POST['produk'][$i],
								'id_peternak'=>$_SESSION['user']['id'],
								'kurir'=>NULL,
								'no_resi'=>NULL,
								'status'=>1
							);
							$arrid[] = $_POST['produk'][$i];
						}
				}
				foreach ($arr as $key) {
					$vaz = "(NULL,'".$key['kd_transaksi']."','".$key['kd_tr_peternak']."','".$key['id_hewan']."','".$key['id_peternak']."',NULL,NULL,'".$key['status']."')";
					$sqlIns = mysqli_query($con,"INSERT INTO tb_transaksi VALUES".$vaz."");
				}
				if ($sqlIns) {
					$totalData = array_values(array_count_values($arrid));
					$uniq = array_values(array_unique($arrid));
					for ($i=0; $i < count($totalData) ; $i++){
						$sqlUpdate = mysqli_query($con,"UPDATE tb_produk SET jumlah =jumlah-'".$totalData[$i]."' WHERE id_hewan='".$uniq[$i]."' ");
					}
					($sqlUpdate) ? $json = array('status'=> 'berhasil'):$json = array('status'=> 'gagal update');
				}else{
					$json = array('status'=> 'gagal');
				}
					echo json_encode($json);
			break;
			case 'check-transaksiku':
				$kode = $_POST['kode'];
				$name = $_FILES['foto']['name'];
				$tmp = $_FILES['foto']['tmp_name'];
				$base_dir = $_SERVER['DOCUMENT_ROOT']."/tugasWeb/ternakin/assets/image/bukti_tf/".$_SESSION['user']['id']."/";
				if (!is_dir($base_dir)) {
					mkdir($base_dir);
				}
				if (move_uploaded_file($tmp, $base_dir.basename($name))) {
					$sql = mysqli_query($con,"INSERT INTO tb_bukti_tf VALUES('".$kode."','".$name."')");
					if($sql){
						$sqlUpdate = mysqli_query($con,"UPDATE tb_transaksi SET status='99' WHERE kd_tr_peternak='".$kode."'");
						($sqlUpdate)? $json = array('status'=> 'berhasil upload') : $json = array('status'=> 'gagal upload');
					}else{
						$json = array('status'=> 'gagal upload');
					}
				}else{
					$json = array('status'=> 'gagal update');
				}
				echo json_encode($json);
				break;
			case 'validasi-bukti':
				$kd = $_POST['kd'];
				$sql = mysqli_query($con, "SELECT DISTINCT(kd_transaksi) as kode , img_bukti_tf FROM tb_bukti_tf WHERE kd_transaksi='".$kd."'");
				$jml = mysqli_num_rows($sql);
				if ($jml<1) {
					$arr[] =array(
						'img' => NULL
					);
					$json = array('data' => $arr);
				}else{
					while ($data = mysqli_fetch_array($sql)) {
						$arr[] =array(
							'img' => $data['img_bukti_tf']
						);
					}
					$json = array('data' => $arr);
				}
				echo json_encode($arr);
				break;
			case 'update-resi-kurir':
				$resi = $_POST['resi'];
				$kurir = $_POST['kurir'];
				$kd = $_POST['kd'];
				$sql = mysqli_query($con, "UPDATE tb_transaksi SET no_resi='".$resi."' , kurir='".$kurir."' WHERE kd_tr_peternak='".$kd."'");
				if ($sql) {
					$json = array('status'=> 'berhasil update');
				}else{
					$json = array('status'=> 'gagal update');
				}
				echo json_encode($json);
				break;
			case 'tambah-rating':
				$id = $_SESSION['user']['id'];
				$rating = $_POST['rating'];
				$kd_tr = $_POST['kd_tr'];
				$sql = mysqli_query($con, "INSERT INTO tb_rating VALUES(NULL,'".$kd_tr."','".$id."','".$rating."')");
				if ($sql) {
					$sqlUp = mysqli_query($con,"UPDATE tb_transaksi SET status='6' WHERE kd_tr_peternak='".$kd_tr."' ");
					$json = array('status'=> 'berhasil beri rating');
				}else{
					$json = array('status'=> 'gagal beri rating');
				}
				echo json_encode($json);
				break;
			case 'cek-alamat':
				$id = $_POST['id_peternak'];
				$sql = mysqli_query($con,"SELECT * FROM tb_peternak LEFT JOIN tb_provinsi ON tb_peternak.id_provinsi = tb_provinsi.id_provinsi LEFT JOIN tb_kota ON tb_kota.id_provinsi = tb_provinsi.id_provinsi WHERE id_peternak='".$id."'") or die(mysqli_error($con));
				$data = mysqli_fetch_assoc($sql);
				$json[] = array(
					'alamat'=>$data['alamat'],
					'provinsi'=>$data['nama_provinsi'],
					'kota'=>$data['nama_kota'],
				);
				echo json_encode($json);
				break;
		default:
			header("HTTP/1.0 404 Not Found");
			break;
	}
 ?>