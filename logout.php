<?php
	// mengaktifkan session
	session_start();
	 
	// menghapus semua session
	session_destroy();
	 
	// mengalihkan halaman sambil mengirim pesan logout
	echo "<script>alert('anda berhasil logout');window.location='/kegiatan_keagamaan_rpl_2020_23april2020/login.php';</script>";
	?>