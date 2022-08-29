<?php
    include('koneksi_database.php');

    //data
    $kamar_id = $_POST['kamar_id'];
    $jeniskam = $_POST['jenis_kam'];
    $tarifkam = $_POST['tarif_perm'];
    $fasilitaskam= $_POST['fasilitas_kam'];

    //menginput data ke database
    mysqli_query($conn, "INSERT INTO kamar (kode_kamar, jenis_kamar, tarif_permalam, fasilitas) VALUES('$kamar_id', '$jeniskam', '$tarifkam', '$fasilitaskam')");

    
    // mengalihkan halaman kembali ke data_kamar.php
    header("Location: data_kamar.php?alert=berhasil_ditambah");
    
?>