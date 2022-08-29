<?php
include "koneksi_database.php";

//mendapatkan kode obat dari halaman untuk menghapus data
$obat_id = $_GET['kode_obat'];

$query = "DELETE FROM obat WHERE kode_obat = '$obat_id'";

if($conn->query($query)) {
    header("location: data_obat.php?alert=berhasil_dihapus");
} else {
    header("location: data_obat.php?alert=gagal_dihapus");
}


?>