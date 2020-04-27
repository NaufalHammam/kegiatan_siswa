<?php
	include '../koneksiDB/koneksi.php';

	$username = $_POST['nama'];
	$yes = $_POST['yes'];
	$no = $_POST['no'];
	$resiko = $_POST['resiko'];

	$input_data = mysqli_query($con,"INSERT INTO frekuensi (nama, yes, no, resiko)VALUES('$nama', '$yes', '$no', '$resiko')");
	if($input_data){
		echo "berhasil";
	}else{
		echo "gagal";
	}
?>