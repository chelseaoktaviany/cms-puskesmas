<?php
    include('koneksi_database.php');

    //data
    $layanan_id = $_POST['layanan_id'];
    $jenislay = $_POST['jenis_l'];
    $tarifl = $_POST['tarif_l'];
    $tel_dok = $_POST['telep'];
    $kodedok = $_POST['kode_dok'];

    //UPDATE SQL data
    $sql = "UPDATE layanan SET jenis_layanan='".$jenislay."', tarif_layanan='".$tarifl."',kode_dokter='".$kodedok."' WHERE kode_layanan='".$layanan_id."'";

    mysqli_query($conn, $sql);
    
    header("Location: data_layanan.php?alert=berhasil");
    
?>