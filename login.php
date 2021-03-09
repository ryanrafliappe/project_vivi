<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Login</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="login-file/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="login-file/css/style.css">

    <?php date_default_timezone_set("Asia/Makassar") ?>
    <?php include "conf/koneksi.php" ?>
</head>

<body>

    <div class="main">


        <div class="container">
            <div class="signin-content">
                <div class="signin-image">
                    <figure><img src="login-file/images/signin-image.jpg" alt="sing up image"></figure>
                    <h4 style="text-align: center;">Jika Belum Memiliki Akun</h4>
                    <a href="register.php" class="display-flex-center" style="text-decoration: none;">Klik Disini!</a>
                </div>

                <div class="signin-form">
                    <h2 class="form-title">Login</h2>
                    <form method="POST" class="register-form" id="login-form">
                        <div class="form-group">
                            <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="email" id="your_name" placeholder="email" autocomplete="off" />
                        </div>
                        <div class="form-group">
                            <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="pass" id="your_pass" placeholder="Password" />
                        </div>

                        <div class="form-group form-button">
                            <input type="submit" name="login" id="signin" class="form-submit" value="Log in" />
                        </div>
                    </form>
                    <h3>Anda bisa langsung menuju halaman utama dengan klik <a href="views/">Halaman Utama</a></h3>
                   
                </div>
            </div>
        </div>

        <?php
        if (isset($_POST['login'])) {
            $email = $_POST['email'];
            $pass = $_POST['pass'];

            $cek = $koneksi->query("SELECT * FROM user WHERE email = '$email' AND katasandi = '$pass'");

            if ($cek->num_rows > 0) {
                if ($email == "admin@admin.com") {
                    $_SESSION['login'] = $cek->fetch_assoc();
                    echo "<script>location='admin/index.php'</script>";
                }else if($email == "workshop@gmail.com") {
                    $_SESSION['login'] = $cek->fetch_assoc();
                    echo "<script>location='workshop/index.php'</script>";
                }else{
                    $_SESSION['login'] = $cek->fetch_assoc();
                    echo "<script>location='views/index.php?page=produk'</script>";
                }
            } else {
                echo "<script>alert('username dan password salah!');location='login.php'</script>";
            }
        }
        ?>


    </div>

    <!-- JS -->
    <script src="login-file/vendor/jquery/jquery.min.js"></script>
    <script src="login-file/js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>