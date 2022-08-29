<?php 
    // koneksi database
    include 'koneksi_database.php';
    
    // menangkap data yang di kirim dari form
    $recordid = $_POST['record_id'];
    $tanggalmasuk = date('Y/m/d h:i A',strtotime($_POST['tanggal_masuk_m']));
    $diag = $_POST['diag'];
    $kode_p = $_POST['kode_p'];
    $alamat_p = $_POST['alamat_p'];
    $tarif_k = $_POST['tarif_k'];
    $tarif_l = $_POST['tarif_l'];
    $kode_dok = $_POST['kode_dok'];
    $kode_lay = $_POST['kode_lay'];
    $kode_kam = $_POST['kode_kam'];
    $kode_oba = $_POST['kode_oba'];
    
    //menginput data ke database
    mysqli_query($conn, "INSERT INTO rekam_medis (no_record, tanggal_masuk, diagnosa, kode_pasien, alamat, tarif_kamar, tarif_layanan, kode_dokter, kode_layanan, kode_kamar, kode_obat) VALUES('$recordid', '$tanggalmasuk', '$diag', '$kode_p', '$alamat_p', '$tarif_k', '$tarif_l', '$kode_dok', '$kode_lay', '$kode_kam', '$kode_oba')");

    // mengalihkan halaman kembali ke data_layanan.php
    header("Location: data_rekaman_medis.php?alert=berhasil_ditambah");
 
?>