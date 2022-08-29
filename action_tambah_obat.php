<?php
    include('koneksi_database.php');

    //data
    $obat_id = $_POST['obat_id'];
    $namaob = $_POST['nama_o'];
    $hargaob = $_POST['harga_o'];
    $desko = $_POST['desk_o'];
    $satuano = $_POST['satuan_o'];

    //menginput data ke database
    mysqli_query($conn, "INSERT INTO obat (kode_obat, nama_obat, harga, deskripsi, satuan) VALUES('$obat_id', '$namaob', '$hargaob', '$desko', '$satuano')");

    
    // mengalihkan halaman kembali ke data_obat.php
    header("Location: data_obat.php?alert=berhasil_ditambah");
    
?>