<?php 
 
session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}
 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles/style.css">
        <title>CMS Puskesmas - Successful login</title>
    </head>
    <body>
        <h2>CMS PUSKESMAS</h2>
        <div class="container2">
            <h4>Admin Portal</h4>
            <?php echo "<h1>Selamat datang, ". $_SESSION['username']. "!" . "</h1>"; ?>
            <br>
            <p>Silakan ke <a href="cms-puskesmas-admin-portal.php">halaman CMS</a></p>
            <div class="logout-button" id="logoutbutton">
                <form action="logout.php" method="POST">
                    <button type="submit" name="logout">LOG OUT</button>
                </form>
            </div>
        </div>
    </body>
</html>