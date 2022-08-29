<?php 
    // koneksi database
    include 'koneksi_database.php';
    
    // menangkap data yang di kirim dari form
    $kode_layanan = $_POST['layanan_id'];
    $jenis_layanan = $_POST['jenis_l'];
    $tarif_layanan = $_POST['tar_lay'];
    $kode_dokter = $_POST['kode_dok'];
    
    //menginput data ke database
    mysqli_query($conn, "INSERT INTO layanan (kode_layanan, jenis_layanan, tarif_layanan, kode_dokter) VALUES('$kode_layanan', '$jenis_layanan', '$tarif_layanan', '$kode_dokter')");

    
    // mengalihkan halaman kembali ke data_layanan.php
    header("Location: data_layanan.php?alert=berhasil_ditambah");
 
?>