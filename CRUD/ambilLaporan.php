<?php

include '../koneksiDB/koneksi.php';

$nis = $_POST['nis'];

$query = mysqli_query($con, "SELECT * FROM laporan WHERE nis_siswa LIKE '$nis'");
	$hasil = [];
	if($query){
		while ($fetchDataKegiatan=mysqli_fetch_assoc($query)){
			array_push($hasil, $fetchDataKegiatan);
		}
		echo json_encode($hasil);
	}else{
		echo "gagal";
	}

?>