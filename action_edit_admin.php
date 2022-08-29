<?php
    session_start();
    include('koneksi_database.php');

    //data
    $adminid = $_POST['admin_id'];
    $username_admin = $_POST['username_admin'];
    $namal_admin = $_POST['nama_admin'];
    $email_a = $_POST['email_admin'];
    $pass_a = $_POST['pass_admin'];
    
    //ambil foto
    $rand = rand();
    $ekstensi =  array('png','jpg','jpeg','bmp', 'svg');
    $filename = $_FILES['image_file']['name'];
    $ukuran = $_FILES['image_file']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION); //destination


 
    if(!in_array($ext,$ekstensi) ) {
        header("location: profile.php?alert=gagal_ekstensi");
    }else{
        if($ukuran < 5044070){		
            $xx = $rand.'_'.$filename;
            move_uploaded_file($_FILES['image_file']['tmp_name'], 'assets/uploaded_pics/'.$rand.'_'.$filename);
            
            mysqli_query($conn, "UPDATE admin SET id_admin='".$adminid."', username='".$username_admin."',nama_lengkap='".$namal_admin."',email='".$email_a."', password='".$pass_a."', image='".$xx."' WHERE id_admin='".$adminid."'");
            header("location: profile.php?alert=berhasil");
        }else{
            header("location: profile.php?alert=gagal_ukuran");
        }
    }
    
?>