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
					'id'=>intval($data['id_hewan']),
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
		case 'proses-produk':
				$total = count($_POST['produk']);
				$sql = mysqli_query($con,"SELECT COUNT(DISTINCT(kd_transaksi)) as id FROM tb_transaksi") or die(mysqli_error($con));
				$data = mysqli_fetch_assoc($sql);
				if ($data['id']==0) {
					$kd = "TR01";
				}else{
					$num = intval($data['id'])+1;
					$kd = "TR0".$num;
				}
				for ($i=0; $i < $total; $i++) { 
					$arr[] = array(
						'id_transaksi'=>NULL,
						'kd_transaksi'=>$kd,
						'id_hewan'=>$_POST['produk'][$i],
						'id_peternak'=>$_SESSION['user']['id'],
						'kurir'=>NULL,
						'no_resi'=>NULL,
						'status'=>1
					);
					$arrid[] = $_POST['produk'][$i];
				}
				foreach ($arr as $key) {
					$vaz = "(NULL,'".$key['kd_transaksi']."','".$key['id_hewan']."','".$key['id_peternak']."',NULL,NULL,'".$key['status']."')";
					$sqlIns = mysqli_query($con,"INSERT INTO tb_transaksi VALUES".$vaz."");
				}
				if ($sqlIns) {
					$totalData = array_values(array_count_values($arrid));
					$uniq = array_values(array_unique($arrid));
					for ($i=0; $i < count($totalData) ; $i++){
						$sqlUpdate = mysqli_query($con,"UPDATE tb_produk SET jumlah =jumlah-'".$totalData[$i]."' WHERE id_hewan='".$uniq[$i]."'  ");
					}
					if ($sqlUpdate){
						$json = array('status'=> 'berhasil');
						echo json_encode($json);
					}else{
						$json = array('status'=> 'gagal update');
						echo json_encode($json);
					}
				}else{
					$json = array('status'=> 'gagal');
					echo json_encode($json);
				}
			break;
		default:
			# code...
			break;
	}
 ?>