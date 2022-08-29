<?php
   session_start();
   unset($_SESSION["uname"]);
   unset($_SESSION["password"]);
   
   //echo 'You have logged out!';
   header('Refresh: 2; URL = index.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles/style.css">
        <title>CMS Puskesmas - Logout Session</title>
    </head>
    <body>
        <h2>CMS PUSKESMAS</h2>
        <div class="container2">
            <h4>Admin Portal</h4>
            <h1>Anda telah keluar dari sesi</h1>
        </div>
    </body>
</html>