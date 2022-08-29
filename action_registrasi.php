<?php
include('koneksi_database.php');

    $username="";
    $errors = array();

    //fungsi register
    if(isset($_POST['register'])){
        $adminid = mysqli_real_escape_string($conn, $_POST['idadmin']);
        $username = mysqli_real_escape_string($conn, $_POST['unamereg']);
        $name = mysqli_real_escape_string($conn, $_POST['namereg']);
        $email = mysqli_real_escape_string($conn, $_POST['emailreg']);
        $password = mysqli_real_escape_string($conn, $_POST['passwordreg']);

        //validasi form bahwa form udh diisi dengan benar
        if(empty($username)){array_push($errors, "Username tidak boleh dikosong");}
        if(empty($email)){array_push($errors, "E-mail tidak boleh dikosong");}
        if(empty($password)){array_push($errors, "Password tidak boleh dikosong");}

        //pertama cek database untuk memeriksa username blm ada dengan username dan/atau email yang sama
        $user_check_query = "SELECT * FROM admin WHERE username='$username' OR email='$email' LIMIT 1";
        $hasil = mysqli_query($conn, $user_check_query);
        $user = mysqli_fetch_assoc($hasil);

        if($user){
            if($user['username'] === $username){
                array_push($errors, "Username sudah ada");
            }
            if($user['email'] === $email){
                array_push($errors, "Email sudah ada");
            }
        }

        //akhirnya, user terdaftar jika tidak ada error di form
        if(count($errors) == 0){

            $query = "INSERT INTO admin (id_admin, username, nama_lengkap, email, password) 
                    VALUES('$adminid','$username','$name','$email','$password')";
            mysqli_query($conn, $query);
            
            header('Location: index.php');
        }
    }

?>