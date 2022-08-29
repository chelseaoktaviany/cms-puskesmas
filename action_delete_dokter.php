<?php
include "koneksi_database.php";

//mendapatkan kode dokter dari halaman untuk menghapus data
$dokter_id = $_GET['kode_dokter'];

$query = "DELETE FROM dokter WHERE kode_dokter = '$dokter_id'";

if($conn->query($query)) {
    header("location: data_dokter.php?alert=berhasil_dihapus");
} else {
    header("location: data_dokter.php?alert=gagal_dihapus");
}


?>