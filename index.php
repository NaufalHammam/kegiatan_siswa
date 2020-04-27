<!DOCTYPE html>
<html>
<head>
	<title>Halaman utama</title>
</head>
	<!-- created by : Naufal Hammam Al mubarok SMK WIKRAMA BOGOR, 0813 8546 9053 for donation if you like _^  -->
	
	<!-- link sama script dari bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<!--  ini link buat css  sweetalert  -->
	<link rel="stylesheet" type="text/css" href="css/animate.css">
	<!-- ini script jquery sama sweetalert -->
	<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	<script type="text/javascript" src="js/fungsi.js"></script>


	<!-- ini biar sesuaiin tampilan mobile -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=0.8, user-scalable=no">

	
	<!-- cek apakah sudah login -->
	<?php 
	session_start();
	if($_SESSION['status']!="login"){
		echo "<script>alert('Anda belum login');window.location='/kegiatan_keagamaan_rpl_2020_23april2020/login.php';</script>";
		}
	?>


<body style="background-color: cyan" class="item-center">
	
	<!--navabar -->
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" >NIS : <?php echo $_SESSION['nis'] ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item" >
          <a class="nav-link" href="#" onclick="dataDiriBuka(<?php echo $_SESSION['nis'] ?>)">Data diri</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" onclick="setJadwal(<?php echo $_SESSION['nis']; ?>)">Set jadwal</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" onclick="isiData(<?php echo $_SESSION['nis']; ?>)">Isi data kegiatan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" onclick="laporan(<?php echo $_SESSION['nis']; ?>)">Laporan kegiatan</a>
        </li>
      </ul>

		<!-- Example single info button -->
		<div class="btn-group">
		  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		    <?php echo $_SESSION['nama']; ?>
		  </button>
		  <div class="dropdown-menu">
		    <a class="dropdown-item" href="settingAkun.php">Setting</a>
		    <div class="dropdown-divider"></div>
		    <a class="dropdown-item" href="logout.php">Logout</a>
		  </div>
		</div>
    </div>
  </nav>
  <!-- penutup navbar -->

  <br>
  <div id="tampilan_data_diri" class="container">
		<div class="card">
			<div class="card-header text-center">
				<h3 class="card-title">Data diri</h3>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-12">
						<div class="card-body">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
								    	<label>NIS</label>
								    	<input type="text" class="form-control" id="nisDiri" value="<?php echo $_SESSION['nis'] ?>" readonly>
								  	</div>
									<div class="form-group">
								    	<label>nama</label>
								    	<input type="text" class="form-control" id="namaDiri"  readonly> 
								  	</div>
								  	<div class="form-group">
								    	<label>rombel</label>
								    	<input type="text" class="form-control" id="rombelDiri" readonly required=""> 
								  	</div>
								  	<div class="form-group">
								    	<label>rayon</label>
								    	<input type="text" class="form-control" id="rayonDiri" readonly>
								  	</div>
								  	
								</div>
								<div class="col-md-6">
									<div class="form-group">
								    	<label>username</label>
								    	<input type="text" class="form-control" id="usernameDiri" readonly>
								  	</div>
								  	<div class="form-group">
								    	<label>password</label>
								    	<input type="password" class="form-control" id="passwordDiri" readonly>
								  	</div>
								  	<div class="form-group form-check">
										<input type="checkbox" class="form-check-input" onclick="showPass()">
										<label class="form-check-label" for="">Show password</label>
									</div>
								  	<div class="form-group">
								    	<label>alamat</label>
								    	<textarea class="form-control" id="alamatDiri" rows="3" cols="50" readonly><?php echo $_SESSION['alamat'] ?></textarea>
								  	</div>
								</div>
								<div class="col-md-12">
									<br>
									<div class="form-group">
										<button id="buttonUbahData" onclick="ubahData(<?php echo $_SESSION['nis'] ?>)" class="btn btn-primary form-control">Ubah data</button>
										<button id="buttonSimpanData" onclick="simpanData(<?php echo $_SESSION['nis'] ?>)" class="btn btn-success form-control">Simpan data</button>
										<button id="buttonBatalSimpan" onclick="batalSimpan(<?php echo $_SESSION['nis'] ?>)" class="btn btn-danger form-control">Batal</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br>


<div id="tampilan_set_jadwal" class="container">
		<div class="card">
			<div class="card-header text-center">
				<h3 class="card-title">Set jadwal</h3>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-12">
						<div class="card-body">
							<div class="row">
								<div class="col-md-12">

									<table class="table table-hover text-center table-sm">
										<thead class="thead bg-light">
											<tr>
												<td>Pukul</td>
												<td>Kegiatan rumah</td>
												<td>Keterangan</td>
											</tr>
										</thead>
										<tbody class="tbody" id="tabel_kegiatan">
										
										</tbody>
									</table>


								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br>
	

	<div id="tampilan_isi_data_kegiatan" class="container item-center">
		<div class="card">
			<div class="card-header text-center">
				<h3 class="card-title">Isi data kegiatan</h3>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-12">
						<div class="card-body">
							<div class="row">

								<div class="col-md-6">
									<table class="table text-center" >
										<thead class="thead bg-light">
											<tr>
												<td colspan="3">waktu terakhir kesini</td>
											</tr>
										</thead>
										<tbody>
											<tr id="waktu_kesini">
												
											</tr>
										</tbody>
									</table>
								</div>
								<div class="col-md-6">
									<table class="table text-center">
										<thead class="thead bg-light">
											<tr>
												<td colspan="3">Waktu saat ini</td>
											</tr>	
										</thead>
										<tbody>
											<tr>
												<td><P id="jam"></P></td>
												<td><p id="menit"></p></td>
												<td><p id="detik"></p></td>
											</tr>
										</tbody>
									</table>
								</div>
								<div class="col-md-12"><button onclick="refreshWaktu(<?php echo $_SESSION['nis'] ?>)" class="btn btn-primary form-control">Refresh waktu terakhir dan tugas saat ini</button></div>
								<br>
								<br>
								<br>
								<br>
								
								<div class="col-md-12">
									<table class="table text-center item-center">
										<thead class="thead bg-light">
											<td>Nama kegiatan</td>
											<td>Aksi</td>
										</thead>
										<tbody id="tabel_pengerjaan">
											
										</tbody>
									</table>
								</div>

								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="tampilan_laporan" class="container item-center">
		<div class="card">
			<div class="card-header text-center">
				<h3 class="card-title">Isi data kegiatan</h3>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-12">
						<div class="card-body">
							<div class="row">
								<div class="col-md-12">
									<table class="table table-hover text-center table-sm">
										<thead class="thead bg-light">
											<tr>
											
												<td>Kode kegiatan</td>
												<td>waktu pengerjaan</td>
											</tr>
										</thead>
										<tbody class="tbody" id="tabel_laporan">
										
										</tbody>
									</table>
								</div>
								

								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


</body>
<script type="text/javascript">
	
	$("#tampilan_data_diri").hide();
	$("#buttonSimpanData").hide();
	$("#buttonBatalSimpan").hide();
	$("#tampilan_set_jadwal").hide();
	$("#tampilan_isi_data_kegiatan").hide();
	$("#tampilan_laporan").hide();
	
	
	window.setTimeout("waktu()", 1000);
	
	function waktu() {
		var waktu_sekarang = new Date();
		setTimeout("waktu()", 1000);
		document.getElementById("jam").innerHTML = waktu_sekarang.getHours();
		document.getElementById("menit").innerHTML = waktu_sekarang.getMinutes();
		document.getElementById("detik").innerHTML = waktu_sekarang.getSeconds();
	}
	
	

</script>
</html>