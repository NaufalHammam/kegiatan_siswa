<?php
  include '../koneksiDB/koneksi.php';
 
  $temp = "../upload/";
  if (!file_exists($temp))
    mkdir($temp);
 
  $nis   = $_POST['nis'];
  $kode_kegiatan   = $_POST['kode_kegiatan'];
  $fileupload      = $_FILES['fileupload']['tmp_name'];
  $ImageName       = $_FILES['fileupload']['name'];
  $ImageType       = $_FILES['fileupload']['type'];
 
  if (!empty($fileupload)){
    $acak           = rand(11111111, 99999999);
    $ImageExt       = substr($ImageName, strrpos($ImageName, '.'));
    $ImageExt       = str_replace('.','',$ImageExt); // Extension
    $ImageName      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
    $NewImageName   = str_replace(' ', '', $acak.'.'.$ImageExt);
 
    move_uploaded_file($_FILES["fileupload"]["tmp_name"], $temp.$NewImageName); // Menyimpan file
 
    $query =mysqli_query($con, "INSERT into laporan (kode_kegiatan, nis_siswa, bukti_pengerjaan, validasi_orang_tua) VALUES ('$kode_kegiatan', '$nis' , '$NewImageName', 'belum')");
   
    if($query){
       echo "Data Berhasil Disimpan";
     }else{
       echo "Data gagal Disimpan";
     }
   
  } else {
    echo "Data Gagal Disimpan";
  }
?>