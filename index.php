<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- stylesheets -->
        <link rel="stylesheet" href="styles/style.css">

        <title>CMS Puskesmas - Login</title>
    </head>
    <body>
    <!-- When getting an error -->
        <h2>CMS PUSKESMAS</h2>
        <div class="container">
            <h4>Admin Portal</h4>
            <?php
                if(isset($_SESSION["error"])){
                    $error = $_SESSION["error"];
                        echo "<span>$error</span>";
                }
            ?>
            <form action="login.php" method="POST">
                <label>username:</label>
                <br>
                <input type="text" name="uname" value="" required>
                <br>
                <label>password:</label>
                <br>
                <input type="password" name="password" value="" required>
                <br>
                <button type="submit" name="submit">SIGN IN</button>
                <br>
                <p>Belum punya akun? <a style="color:#577278;" href="registrasi.php">Daftar akun</a></p>
            </form>
        </div>
    </body>
</html>

<?php
    unset($_SESSION['error']);
?>