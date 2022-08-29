<?php
    include('koneksi_database.php');

    //data
    $pasien_id = $_POST['pasien_id'];
    $namapas = $_POST['nama_p'];
    $jk = $_POST['jenisk_pasien'];
    $goldar = $_POST['gol_d_pasien'];
    $tgl_l = date('Y/m/d', strtotime($_POST['tgll_pasien']));
    $alamat = $_POST['alamat_pasien'];

    //UPDATE SQL data
    $sql = "UPDATE pasien SET nama_pasien='".$namapas."', jenis_kelamin='".$jk."',gol_darah='".$goldar."',tanggal_lahir='".$tgl_l."', alamat='".$alamat."' WHERE kode_pasien='".$pasien_id."'";

    mysqli_query($conn, $sql);
    
    header("Location: data_pasien.php?alert=berhasil");
    
?>