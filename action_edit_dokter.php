<?php
    include('koneksi_database.php');

    //data
    $dokter_id = $_POST['dokter_id'];
    $namadok = $_POST['nama_d'];
    $jk = $_POST['jenisk_dokter'];
    $tel_dok = $_POST['telep'];
    $alamat = $_POST['alamat_dokter'];
    $keahlian_dok = $_POST['keahlian_dok'];

    //UPDATE SQL data
    $sql = "UPDATE dokter SET nama_dokter='".$namadok."', jenis_kelamin='".$jk."',telepon='".$tel_dok."',alamat='".$alamat."', keahlian='".$keahlian_dok."' WHERE kode_dokter='".$dokter_id."'";

    mysqli_query($conn, $sql);
    
    header("Location: data_dokter.php?alert=berhasil");
    
?>