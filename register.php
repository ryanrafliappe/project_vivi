<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Pendaftaran</title>

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
            <div class="signup-content">
                <div class="signup-form">
                    <h2 class="form-title">Daftar</h2>
                    <form action="" method="POST" class="register-form" id="register-form">
                        <div class="form-group">
                            <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="name" id="name" placeholder="Nama" required/>
                        </div>
                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-email"></i></label>
                            <input type="email" name="email" id="email" placeholder="Email" required/>
                        </div>
                        <div class="form-group">
                            <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="pass" id="pass" placeholder="Password" required/>
                        </div>
                        <div class="form-group">
                            <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                            <input type="password" name="re_pass" id="re_pass" placeholder="Ulang password" required/>
                        </div>
                        <!-- <div class="form-group">
                            <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                            <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all
                                statements in <a href="#" class="term-service">Terms of service</a></label>
                        </div> -->
                        <div class="form-group form-button">
                            <input type="submit" name="daftar" id="signup" class="form-submit" value="Daftar" />
                        </div>
                    </form>
                </div>
                <div class="signup-image">
                    <figure><img src="login-file/images/signup-image.jpg" alt="sing up image"></figure>
                    <a href="login.php" class="signup-image-link">Sudah Daftar, Login!</a>
                </div>
            </div>
        </div>

        <!-- query pendaftaran -->
            
        <!-- batas query pendaftaran -->
    </div>

    <!-- JS -->
    <script src="login-file/vendor/jquery/jquery.min.js"></script>
    <script src="login-file/js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>

<?php

if(isset($_POST['daftar'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $re_post = $_POST['re_pass'];

    if(strlen($pass) <= 8){
        echo "<script>alert('Password harus lebih dari 8 digit');location='register.php'</script>";
    }else if($pass == $re_post){

        $sql = "INSERT INTO user (nama, email, katasandi) VALUES ('$name', '$email', '$pass')";
        $query = mysqli_query($koneksi, $sql);

        if($query){
            echo "<script>alert('Data berhasil ditambah');location='login.php'</script>";
        }
    }else{
        echo "<script>alert('Username dan Password tidak sesuai!');location='register.php'</script>";
    }
}

?>