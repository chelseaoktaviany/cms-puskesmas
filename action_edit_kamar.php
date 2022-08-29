<?php
    include('koneksi_database.php');

    //data
    $kamar_id = $_POST['kamar_id'];
    $jeniskam = $_POST['jenis_kam'];
    $tarifpermal = $_POST['tarifperm'];
    $fasilitaskam = $_POST['fasilitas_kam'];

    //UPDATE SQL data
    $sql = "UPDATE kamar SET kode_kamar='".$kamar_id."', jenis_kamar='".$jeniskam."',tarif_permalam='".$tarifpermal."',fasilitas='".$fasilitaskam."' WHERE kode_kamar='".$kamar_id."'";

    mysqli_query($conn, $sql);
    
    header("Location: data_kamar.php?alert=berhasil");
    
?>