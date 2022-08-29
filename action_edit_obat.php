<?php
    include('koneksi_database.php');

    //data
    $obat_id = $_POST['obat_id'];
    $namaob = $_POST['nama_o'];
    $hargaob = $_POST['harga_o'];
    $desko = $_POST['desk_o'];
    $satuano = $_POST['satuan_o'];

    //UPDATE SQL data
    $sql = "UPDATE obat SET kode_obat='".$obat_id."', nama_obat='".$namaob."',harga='".$hargaob."',deskripsi='".$desko."',satuan='".$satuano."' WHERE kode_obat='".$obat_id."'";

    mysqli_query($conn, $sql);
    
    header("Location: data_obat.php?alert=berhasil");
    
?>