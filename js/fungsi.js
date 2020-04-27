
	//buat lihat password
	var abc = false;
		function checkPass() {

			//console.log($('#password').attr('type'));
			if(abc === false){
				$('#password').attr('type','text');
				abc = true;
			}else{
				$('#password').attr('type','password');
				abc = false;
			}
			//console.log(abc);
		}
	var bca = false;
		function showPass() {

			//console.log($('#password').attr('type'));
			if(bca === false){
				$('#passwordDiri').attr('type','text');
				bca = true;
			}else{
				$('#passwordDiri').attr('type','password');
				bca = false;
			}
			//console.log(abc);
		}
	//tutup buat lihat password

		//tombol masuk login
		function masuk(){

			var isi_username = $("#username").val();
			var isi_password = $("#password").val();
			//console.log(isi_username);
			//console.log(isi_password);

			if(isi_username === "" || isi_password === ""){

				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'Something went wrong!',
				  footer: '<a href>Why do I have this issue?</a>'
				});

			}else{
				
				$.ajax({
			    	type : "POST",
	                data : "username="+isi_username+"&password="+isi_password,
	                url : 'CRUD/cek_login.php',
	                success: function(response){
	                
	            		if(response === 'gagal'){
	            			Swal.fire({
							  icon: 'error',
							  title: 'Oops...',
							  text: 'Username atau password salah',
							  //footer: '<a href>Why do I have this issue?</a>'
							});
	            		}else{
	            			var resp = JSON.parse(response)
	                		
							Swal.fire({ 
							  icon: 'success',
							  title: 'Selamat datang',
							  text: resp['nama'],
							  showConfirmButton: false,
							  timer: 1500
							});

						setTimeout("window.location='/kegiatan_keagamaan_rpl_2020_23april2020/index.php'", 1500);

	            		}
	                
	                }
			    });	
			}
			//tutup else		
		}
		//tutup function masuk


		//isi data diri
		function dataDiriBuka(nis) {
			//console.log(nis);
			$("#tampilan_data_diri").show('slow');
			$("#tampilan_set_jadwal").hide("slow");
			$("#tampilan_isi_data_kegiatan").hide("slow");
			$("#tampilan_laporan").hide('slow');
            $.ajax({
                type : "POST",
                data : "nis="+nis,
                url : "CRUD/ambilData.php",
                success: function(result){
                	
                    var preobjResult = JSON.parse(result);
             		var objResult = preobjResult[0];
                    $('#namaDiri').val(objResult.nama);
					$('#rombelDiri').val(objResult.rombel);
					$('#rayonDiri').val(objResult.rayon);
					$('#usernameDiri').val(objResult.username);
					$('#passwordDiri').val(objResult.password);
					$('#alamatDiri').val(objResult.alamat);

                }
            });
		}
		//sampai sini isi data diri

		
		//ubah data
		function ubahData(nis) {
			//console.log(nis);
			$("#buttonUbahData").hide('slow');
			$("#buttonSimpanData").show('slow');
			$("#buttonBatalSimpan").show('slow');

			$('#namaDiri').attr('readonly', false);
			$('#rombelDiri').attr('readonly', false);
			$('#rayonDiri').attr('readonly', false);
			$('#passwordDiri').attr('readonly', false);
			$('#alamatDiri').attr('readonly', false);
		}
		//sampai sini ubah data


		//simpan data yang diubah
		function simpanData(nis) {

			var isiNama = $("#namaDiri").val();
			var isiRombel = $("#rombelDiri").val();
			var isiRayon = $("#rayonDiri").val();
			var isiPassword = $("#passwordDiri").val();
			var isiAlamat = $("#alamatDiri").val();

			if(isiNama === '' || isiRombel === '' || isiRayon === '' || isiPassword === '' || isiAlamat === '' || isiNama.length < 3 || isiRombel.length < 3 || isiRayon.length < 3){
				Swal.fire({
				    icon: 'error',
					title: 'Oops...',
					text: 'Data harus diisi dengan benar',
					//footer: '<a href>Why do I have this issue?</a>'
				});
			}else if (isiPassword.length < 6) {
				Swal.fire({
				    icon: 'error',
					title: 'Oops...',
					text: 'Password terlalu sedikit ( minimal 6 karakter )',
					//footer: '<a href>Why do I have this issue?</a>'
				});
			}else{
				$.ajax({
			    	type : "POST",
	                data : "nis="+nis+"&nama="+isiNama+"&rombel="+isiRombel+"&rayon="+isiRayon+"&password="+isiPassword+"&alamat="+isiAlamat,
	                url : 'CRUD/updateAkun.php',
	                success: function(response){
	                //console.log(response);
	            		if(response === 'gagal'){
	            			Swal.fire({
							  icon: 'error',
							  title: 'Oops...',
							  text: 'Data gagal di ubah',
							});
	            		}else{
							Swal.fire({ 
							  icon: 'success',
							  title: 'berhasil',
							  text: 'Data berhasil diubah',
							  showConfirmButton: false,
							  timer: 1500
							});

							$('#namaDiri').attr('readonly', true);
							$('#rombelDiri').attr('readonly', true);
							$('#rayonDiri').attr('readonly', true);
							$('#passwordDiri').attr('readonly', true);
							$('#alamatDiri').attr('readonly', true);
							
							$("#buttonUbahData").show('slow');
							$("#buttonSimpanData").hide('slow');
							$("#buttonBatalSimpan").hide('slow');
	            		}
	                
	                }
			    });	
			}

			
		}
		//sampai sini simpan data yang di ubah

		function batalSimpan(nis) {

			$("#buttonUbahData").show('slow');
			$("#buttonSimpanData").hide('slow');
			$("#buttonBatalSimpan").hide('slow');

            $.ajax({
                type : "POST",
                data : "nis="+nis,
                url : "CRUD/ambilData.php",
                success: function(result){
                	
                    var preobjResult = JSON.parse(result);
             		var objResult = preobjResult[0];
                    $('#namaDiri').val(objResult.nama);
					$('#rombelDiri').val(objResult.rombel);
					$('#rayonDiri').val(objResult.rayon);
					$('#usernameDiri').val(objResult.username);
					$('#passwordDiri').val(objResult.password);
					$('#alamatDiri').val(objResult.alamat);

					$('#namaDiri').attr('readonly', true);
					$('#rombelDiri').attr('readonly', true);
					$('#rayonDiri').attr('readonly', true);
					$('#passwordDiri').attr('readonly', true);
					$('#alamatDiri').attr('readonly', true);
                }
            });
		}


		function setJadwal(nis){

			$("#tampilan_data_diri").hide("slow");
			$("#tampilan_set_jadwal").show("slow");
			$("#tampilan_isi_data_kegiatan").hide("slow");
			$("#tampilan_laporan").hide('slow');

			var sekarang = new Date();
			var jam_sekarang = sekarang.getHours();
			var menit_sekarang = sekarang.getMinutes();
			var detik_sekarang = sekarang.getSeconds();

			 $.ajax({
                type : "POST",
                data : "nis="+nis+"&jam="+jam_sekarang+"&menit="+menit_sekarang+"&detik="+detik_sekarang,
                url : "CRUD/ambilDataKegiatan.php",
                success: function(result){

                	var resp = JSON.parse(result);
                	
                	var kegiatan = resp[0];
                	var laporan = resp[1];

                	var kegiatan_sudah = [];
                	$.each(laporan, function(key, val) {
                		kegiatan_sudah.push(val['kode_kegiatan']);
                	});
                	
                	var tampilan_kegiatan_saat_ini = $("#tabel_kegiatan");
                	tampilan_kegiatan_saat_ini.html("");

                	$.each(kegiatan, function(key, val) {

			           	var keterangan_kegiatan = '';
			        	var kode_kegiatan = val['kode_kegiatan'];
			        	var nama_kegiatan = val['nama_kegiatan'];
			        	var pre_waktu_kegiatan_dari = val['waktu_kegiatan_dari'] ;
			        	var waktu_kegiatan_dari = pre_waktu_kegiatan_dari.slice(0, -3);
			        	var pre_waktu_kegiatan_sampai = val['waktu_kegiatan_sampai'] ;
			        	var waktu_kegiatan_sampai = pre_waktu_kegiatan_sampai.slice(0, -3);



			        	if(laporan.length < 1){
			        		keterangan_kegiatan = 'belum';
			        	}else{
			        		for(var i = 0; i < kegiatan_sudah.length; i++ ){
				        		if(kode_kegiatan === kegiatan_sudah[i] ){
				        			keterangan_kegiatan = 'selesai';
								}else{
									keterangan_kegiatan = 'belum';
								}
				        	
				        	}
			        	}

						var tambahan_tampilan_kegiatan = $("<tr><td>"+ waktu_kegiatan_dari + " - " + waktu_kegiatan_sampai +"</td><td>"+nama_kegiatan+"</td><td>"+keterangan_kegiatan+"</td></tr>");
						tampilan_kegiatan_saat_ini.append(tambahan_tampilan_kegiatan);
			          
			        });
                
                }
            });

		}

		function isiData(nis) {
			$("#tampilan_isi_data_kegiatan").show("slow");
			$("#tampilan_data_diri").hide("slow");
			$("#tampilan_set_jadwal").hide("slow");
			$("#tampilan_laporan").hide('slow');

			var sekarang = new Date();
			var jam_sekarang = sekarang.getHours();
			var menit_sekarang = sekarang.getMinutes();
			var detik_sekarang = sekarang.getSeconds();
		
			$.ajax({
                type : "POST",
                data : "nis="+nis+"&jam="+jam_sekarang+"&menit="+menit_sekarang+"&detik="+detik_sekarang,
                url : "CRUD/ambilDataKegiatanSekarang.php",
                success: function(result){
                	
                	var resp = JSON.parse(result);
                		
					var tampilan_pengerjaan_saat_ini = $("#tabel_pengerjaan");
                	tampilan_pengerjaan_saat_ini.html("");
                	
					var no = 0;
                	$.each(resp, function(key, val) {
                		var kegiatan = val['kode_kegiatan'];
                		var tambahan_tampilan_pengerjaan = $("<tr><td>"+ val['nama_kegiatan'] + "</td><td><input type='file' id='fileupload"+no+"' name='"+kegiatan+"' class='form-control'><button id='kirim' class='btn btn-primary form-control' onclick='kirim_perngerjaan("+nis+", "+no+")'>Kirim data</button></td></tr>");
                		tampilan_pengerjaan_saat_ini.append(tambahan_tampilan_pengerjaan);
                		no++;
                	});

				}
			});
			
			var tampilan_waktu_saat_ini = $("tr#waktu_kesini");
			tampilan_waktu_saat_ini.html("");
			var tambahan_tampilan = $("<td>"+jam_sekarang+"</td><td>"+menit_sekarang+"</td><td>"+detik_sekarang+"</td>");
			tampilan_waktu_saat_ini.append(tambahan_tampilan);

			

		}

		function refreshWaktu(nis) {
			
			var sekarang = new Date();
			var jam_sekarang = sekarang.getHours();
			var menit_sekarang = sekarang.getMinutes();
			var detik_sekarang = sekarang.getSeconds();
			
			var tampilan_waktu_saat_ini = $("tr#waktu_kesini");
			tampilan_waktu_saat_ini.html("");
			var tambahan_tampilan = $("<td>"+jam_sekarang+"</td><td>"+menit_sekarang+"</td><td>"+detik_sekarang+"</td>");
			tampilan_waktu_saat_ini.append(tambahan_tampilan);
			
			$.ajax({
                type : "POST",
                data : "nis="+nis+"&jam="+jam_sekarang+"&menit="+menit_sekarang+"&detik="+detik_sekarang,
                url : "CRUD/ambilDataKegiatanSekarang.php",
                success: function(result){
                	
                	var resp = JSON.parse(result);
                	//console.log(resp);
					var tampilan_pengerjaan_saat_ini = $("#tabel_pengerjaan");
                	tampilan_pengerjaan_saat_ini.html("");
                	
                	var no = 0;
                	$.each(resp, function(key, val) {
                		var kegiatan = val['kode_kegiatan'];
                		//console.log(kegiatan);
                		var tambahan_tampilan_pengerjaan = $("<tr><td>"+ val['nama_kegiatan'] + "</td><td><input type='file' id='fileupload"+no+"' class='form-control'><button id='kirim' class='btn btn-primary form-control' onclick='kirim_perngerjaan("+nis+", "+no+")'>Kirim data</button></td></tr>");
                		tampilan_pengerjaan_saat_ini.append(tambahan_tampilan_pengerjaan);
                		no++
                	});

				}
			});
			
			var tampilan_waktu_saat_ini = $("tr#waktu_kesini");
			tampilan_waktu_saat_ini.html("");
			var tambahan_tampilan = $("<td>"+jam_sekarang+"</td><td>"+menit_sekarang+"</td><td>"+detik_sekarang+"</td>");
			tampilan_waktu_saat_ini.append(tambahan_tampilan);
		}

		function laporan(nis) {
			
			$("#tampilan_data_diri").hide("slow");
			$("#tampilan_set_jadwal").hide("slow");
			$("#tampilan_isi_data_kegiatan").hide("slow");
			$("#tampilan_laporan").show('slow');

			

			 $.ajax({
                type : "POST",
                data : "nis="+nis,
                url : "CRUD/ambilLaporan.php",
                success: function(result){

                	if(result !== 'gagal'){
                		var resp = JSON.parse(result);

                		console.log(resp);
                		var tampilan_laporan = $("#tabel_laporan");
                		tampilan_laporan.html("");
                		$.each(resp, function(key, val) {
	                		
	                		var tambahan_tampilan_pengerjaan = $("<tr><td>"+val['kode_kegiatan']+"</td><td>"+val['waktu_pengerjaan']+"</td></tr>");
	                		tampilan_laporan.append(tambahan_tampilan_pengerjaan);
	                	
	                	});
                	}
                
                }
            });
		}

		function kirim_perngerjaan(nis, no) {
			console.log(nis);
			console.log(no);
			
			var button = $('#fileupload'+no);
			console.log(button);
			var isi_button = button[0];
			console.log(isi_button);
			var name_isi_button = isi_button['name'];
			console.log(name_isi_button);

		
			const fileupload = $('#fileupload'+no).prop('files')[0];
	 
		        let formData = new FormData();
		        formData.append('fileupload', fileupload);
		        formData.append('nis', nis);        
		        formData.append('kode_kegiatan', name_isi_button);
	 
		        $.ajax({
		            type: 'POST',
		            url: "CRUD/upload_gambar.php",
		            data: formData,
		            cache: false,
		            processData: false,
		            contentType: false,
		            success: function (msg) {
		            	Swal.fire({ 
							  icon: 'success',
							  title: 'Selamat',
							  text: 'data berhasil dikirim',
							  showConfirmButton: false,
							  timer: 1500
							});

		             
		                setTimeout("window.location='/kegiatan_keagamaan_rpl_2020_23april2020/index.php'", 1500);

		            }
		        });
       	
		}
