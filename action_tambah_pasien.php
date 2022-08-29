<?php 
// koneksi database
include 'koneksi_database.php';
 
// menangkap data yang di kirim dari form
$kode_pasien = $_POST['pasien_id'];
$nama_pasien = $_POST['nama_p'];
$jenis_kelamin = $_POST['jenisk_pasien'];
$goldar = $_POST['gol_d_pasien'];
$tgl_lhr = $_POST['tgll_pasien'];
$alamat = $_POST['alamat_pasien'];
 
//menginput data ke database
mysqli_query($conn, "INSERT INTO pasien (kode_pasien, nama_pasien, jenis_kelamin, gol_darah, tanggal_lahir, alamat) VALUES('$kode_pasien', '$nama_pasien', '$jenis_kelamin', '$goldar', '$tgl_lhr', '$alamat')");

 
// mengalihkan halaman kembali ke data_pasien.php
header("Location: data_pasien.php?alert=berhasil_ditambah");
 
?>