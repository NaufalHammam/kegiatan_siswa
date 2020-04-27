<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
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
	
	<!-- buat tampilan mobile -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

	<!-- buat mengetahui login atau belum -->


<body class="text-center" style="background-color: cyan; align-items: center;">

	<br>
	<div id="table_login" class="container col-md-7" style="align-items: center;">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Aplikasi Kegiatan Keseharian SMK WIKRAMA BOGOR</h3>
			</div>
			<div class="card-body">
				<div class="form-group">
					<label>Username</label>
						<input type="text" class="form-control" id="username">
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" class="form-control" id="password">
					</div>
					<div class="form-group form-check">
						<input type="checkbox" class="form-check-input" onclick="checkPass()">
						<label class="form-check-label" for="">Show password</label>
					</div>
				<input type="submit" name="" class="btn btn-primary form-control" onclick="masuk()" value="Masuk">
			
			</div>
		</div>
	</div>

</body>
	


</html>