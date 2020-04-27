<?php
	
	//aktifkan session
	session_start();

	//menghubungkan ke DB
	include '../koneksiDB/koneksi.php';

	$username = $_POST['username'];
	$password = $_POST['password'];
	//$data = mysqli_query($koneksi,"select * from admin where username='$username' and password='$password'");

	$cek_data = mysqli_query($con,"SELECT * FROM akun WHERE username='$username' AND password='$password' ");
	$cek_row = mysqli_num_rows($cek_data);
	
	if($cek_row > 0){
		
		while ($fetchData=mysqli_fetch_assoc($cek_data)){
			$hasil[]= $fetchData;
		}
		$hasil_lanjutan = $hasil[0];
		$hasil_nama = $hasil_lanjutan['nama'];
		$hasil_rombel = $hasil_lanjutan['rombel'];
		$hasil_rayon = $hasil_lanjutan['rayon'];
		$hasil_username = $hasil_lanjutan['username'];
		$hasil_password = $hasil_lanjutan['password'];
		$hasil_alamat = $hasil_lanjutan['alamat'];
		$hasil_nis = $hasil_lanjutan['NIS'];
		
		$_SESSION['status'] = "login";
		$_SESSION['nama'] = $hasil_nama;
		$_SESSION['rombel'] = $hasil_rombel;
		$_SESSION['rayon'] = $hasil_rayon;
		$_SESSION['username'] = $hasil_username;
		$_SESSION['password'] = $hasil_password;
		$_SESSION['alamat'] = $hasil_alamat;
		$_SESSION['nis'] = $hasil_nis;
		
		//echo $hasil_id;
		echo json_encode($hasil_lanjutan);
	}else{
		echo "gagal";
	}
?>