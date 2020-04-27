<?php

	include '../koneksiDB/koneksi.php';

	$nis = $_POST['nis'];
	$jam_sekarang = $_POST['jam'];
	$menit_sekarang = $_POST['menit'];
	$detik_sekarang = $_POST['detik'];
	
	//$tanggal = date('Y-m-d');
	$tanggal=date_create("2020-04-25");
	date_time_set($tanggal, $jam_sekarang, $menit_sekarang, $detik_sekarang);
	$kombinasi_waktu = date_format($tanggal," H:i:s");
	
	if($kombinasi_waktu >= '20:00:00'){
		$ambil_kode_kegiatan = mysqli_query($con, "SELECT * FROM kegiatan_siswa WHERE waktu_kegiatan_dari LIKE '20:00:00' AND waktu_kegiatan_sampai LIKE '02:00:00'");	
	}else{
		$ambil_kode_kegiatan = mysqli_query($con, "SELECT * FROM kegiatan_siswa WHERE waktu_kegiatan_dari <= '$kombinasi_waktu' AND waktu_kegiatan_sampai >= '$kombinasi_waktu'");
	}

	if($ambil_kode_kegiatan){
		while ($fetchData=mysqli_fetch_assoc($ambil_kode_kegiatan)){
			$semua_data[]= $fetchData;
		}
		echo json_encode($semua_data);
	}else{
		echo "gagal";
	}

?>