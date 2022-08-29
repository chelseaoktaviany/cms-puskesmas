<?php
include "koneksi_database.php";

//mendapatkan kode kamar dari halaman untuk menghapus data
$kamar_id = $_GET['kode_kamar'];

$query = "DELETE FROM kamar WHERE kode_kamar = '$kamar_id'";

if($conn->query($query)) {
    header("location: data_kamar.php?alert=berhasil_dihapus");
} else {
    header("location: data_kamar.php?alert=gagal_dihapus");
}


?>