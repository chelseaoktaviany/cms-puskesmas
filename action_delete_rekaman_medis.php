<?php
    include "koneksi_database.php";

    //mendapatkan kode rekaman medis dari halaman untuk menghapus data
    $recordid = $_GET['no_record'];

    $query = "DELETE FROM rekam_medis WHERE no_record = '$recordid'";

    if($conn->query($query)) {
        header("location: data_rekaman_medis.php?alert=berhasil_dihapus");
    } else {
        header("location: data_rekaman_medis.php?alert=gagal_dihapus");
    }


?>