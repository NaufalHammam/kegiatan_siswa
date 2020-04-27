<?php

	include '../koneksiDB/koneksi.php';

	$nis = $_POST['nis'];
	$jam_sekarang = $_POST['jam'];
	$menit_sekarang = $_POST['menit'];
	$detik_sekarang = $_POST['detik'];
	
	$tanggal = date('Y-m-d');
	//echo $tanggal;


	$data_kegiatan = [];
	$data_laporan = [];

	$ambil_kegiatan = mysqli_query($con, "SELECT * FROM kegiatan_siswa");
	if($ambil_kegiatan){
		while ($fetchDataKegiatan=mysqli_fetch_assoc($ambil_kegiatan)){
			array_push($data_kegiatan, $fetchDataKegiatan);
		}
		//echo json_encode($semua_data);
	}
	
	$ambil_laporan = mysqli_query($con, "SELECT * FROM laporan WHERE nis_siswa LIKE '$nis' AND waktu_pengerjaan LIKE '$tanggal%' ");
	if($ambil_laporan){
		while ($fetchDataLaporan=mysqli_fetch_assoc($ambil_laporan)){
			array_push($data_laporan, $fetchDataLaporan);
		}
	}

	$hasil = [$data_kegiatan, $data_laporan];
	echo json_encode($hasil);


	

?>