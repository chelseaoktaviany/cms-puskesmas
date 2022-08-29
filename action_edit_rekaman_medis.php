<?php
    include('koneksi_database.php');

    //data
    $recordid = $_POST['record_id'];
    $tanggalmasuk = date('Y/m/d h:i A', strtotime($_POST['tanggal_masuk']));
    $diag = $_POST['diag'];
    $kode_pas = $_POST['kode_p'];
    $alamat_p = $_POST['alamat_p'];
    $tarif_k = $_POST['tarif_k'];
    $tarif_l = $_POST['tarif_l'];
    $kode_dok = $_POST['kode_dok'];
    $kode_lay = $_POST['kode_lay'];
    $kode_kam = $_POST['kode_kam'];
    $kode_ob = $_POST['kode_oba'];
    

    //UPDATE SQL data
    $sql = "UPDATE rekam_medis 
            SET no_record='".$recordid."', tanggal_masuk='".$tanggalmasuk."',diagnosa='".$diag."',kode_pasien='".$kode_pas."',
            alamat='".$alamat_p."',tarif_kamar='".$tarif_k."',tarif_layanan='".$tarif_l."',kode_dokter='".$kode_dok."', 
            kode_layanan='".$kode_lay."',kode_kamar='".$kode_kam."', kode_obat='".$kode_ob."' WHERE no_record='".$recordid."'";

    mysqli_query($conn, $sql);
    
    header("Location: data_rekaman_medis.php?alert=berhasil");


        
?>