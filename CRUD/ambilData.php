<?php 

	include '../koneksiDB/koneksi.php';

	$nis = $_POST['nis'];

	$ambil_data = mysqli_query($con,"SELECT * FROM akun WHERE NIS='$nis' ");
	if($ambil_data){
		while ($fetchData=mysqli_fetch_assoc($ambil_data)){
			$semua_data[]= $fetchData;
		}
		echo json_encode($semua_data);
	}else{
		echo "gagal";
	}
?>