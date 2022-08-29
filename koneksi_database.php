<?php
$servername = "localhost"; //nama server
$database = "cms-puskesmas"; //nama database
$username = "root"; //username
$password = ""; //password

//membuat koneksi
$conn = mysqli_connect($servername, $username, $password, $database);

//mengecek koneksi
if(!$conn){
    die("<script>alert('Gagal tersambung dengan database.')</script>");
}
?>