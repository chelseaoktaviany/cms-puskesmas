<?php
include "koneksi_database.php";

//mendapatkan kode layanan dari halaman untuk menghapus data
$layanan_id = $_GET['kode_layanan'];

$query = "DELETE FROM layanan WHERE kode_layanan = '$layanan_id'";

if($conn->query($query)) {
    header("location:data_layanan.php?alert=berhasil_dihapus");
} else {
    header("location:data_layanan.php?alert=gagal_dihapus");
}


?>