<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- stylesheets -->
        <link rel="stylesheet" href="styles/style.css">

        <title>CMS Puskesmas - Registrasi</title>
    </head>
    <body>
        <h2>CMS PUSKESMAS</h2>
        <div class="container" id="registrasi-box">
            <h4>Admin Portal - Registrasi</h4>
            <?php
                if(isset($_SESSION["error"])){
                    $error = $_SESSION["error"];
                        echo "<span>$error</span>";
                }
            ?>
            <form action="action_registrasi.php" method="POST">
                <label>id admin:</label>
                <br>
                <input type="text" name="idadmin" value="" required>
                <br>
                <label>username:</label>
                <br>
                <input type="text" name="unamereg" value="" required>
                <br>
                <label>nama:</label>
                <br>
                <input type="text" name="namereg" value="" required>
                <br>
                <label>email:</label>
                <br>
                <input type="text" name="emailreg" value="" required>
                <br>
                <label>password:</label>
                <br>
                <input type="password" name="passwordreg" value="" required>
                <br>
                <button type="submit" name="register">SIGN UP</button>
                <br>
                <p>Sudah punya akun? <a style="color:#577278;" href="index.php">Login akun</a></p>
            </form>
        </div>
    </body>
</html>