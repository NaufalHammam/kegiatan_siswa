<?php 
	
	include '../koneksiDB/koneksi.php';

	$nis = $_POST['nis'];
	$nama = $_POST['nama'];
	$rombel = $_POST['rombel'];
	$rayon = $_POST['rayon'];
	$alamat = $_POST['alamat'];
	$password = $_POST['password'];
	//$data = mysqli_query($koneksi,"select * from admin where username='$username' and password='$password'");

	$update_data = mysqli_query($con, "UPDATE akun SET nama = '$nama', rombel = '$rombel', rayon = '$rayon', alamat = '$alamat', password = '$password' WHERE NIS = '$nis'");
	if($update_data){
		echo "berhasil";
	}else{
		echo "gagal";
	}

?>