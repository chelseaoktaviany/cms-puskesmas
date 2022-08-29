<?php 
// koneksi database
include 'koneksi_database.php';
 
// menangkap data yang di kirim dari form
$kode_dokter = $_POST['dokter_id'];
$nama_dokter = $_POST['nama_d'];
$jenis_kelamin = $_POST['jenisk_dokter'];
$telepon = $_POST['tel_dok'];
$alamat = $_POST['alamat_dok'];
$keahlian = $_POST['keahlian_dok'];
 
//menginput data ke database
mysqli_query($conn, "INSERT INTO dokter (kode_dokter, nama_dokter, jenis_kelamin, telepon, alamat, keahlian) VALUES('$kode_dokter', '$nama_dokter', '$jenis_kelamin', '$telepon', '$alamat', '$keahlian')");

 
// mengalihkan halaman kembali ke data_pasien.php
header("Location: data_dokter.php?alert=berhasil_ditambah");
 
?>