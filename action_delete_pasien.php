<?php
include "koneksi_database.php";

//mendapatkan kode pasien dari halaman untuk menghapus data
$pasien_id = $_GET['kode_pasien'];

$query = "DELETE FROM pasien WHERE kode_pasien = '$pasien_id'";

if($conn->query($query)) {
    header("location: data_pasien.php?alert=berhasil_dihapus");
} else {
    header("location: data_pasien.php?alert=gagal_dihapus");
}


?>