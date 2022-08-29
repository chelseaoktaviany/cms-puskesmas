
<?php 

session_start(); 

include "koneksi_database.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

    function validate($data){
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
    }

    $uname = validate($_POST['uname']);
    $pass = validate($_POST['password']);
    $error = "<script>alert('Username atau password Anda salah. Mohon coba lagi.');</script>";

    $sql = "SELECT * FROM admin WHERE username='$uname' AND password='$pass'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if ($row['username'] === $uname && $row['password'] === $pass) {
            $_SESSION['username'] = $row['username'];
            header("Location: berhasil_login.php");
            exit();
        }else{
            $_SESSION['error'] = $error;
            header('Location: index.php');
            }
        }else{
            $_SESSION['error'] = $error;
            header('Location: index.php');
        }
    }
    else{
    header("Location: berhasil_login.php");
    exit();
}