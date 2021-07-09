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
    <?php
    include "conf/koneksi.php";
    include "classes/class.phpmailer.php";
    ?>
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
                        <!-- <div class="form-group">
                            <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="pass" id="pass" placeholder="Password" required/>
                        </div>
                        <div class="form-group">
                            <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                            <input type="password" name="re_pass" id="re_pass" placeholder="Ulang password" required/>
                        </div> -->
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
$get =  $koneksi->query("SELECT * FROM user");

while ($data = $get->fetch_assoc()) {
  $emailLama = $data['email'];
  }
  if(isset($_POST['daftar'])){
      $name = $_POST['name'];
      $email = $_POST['email'];
      // $pass = $_POST['pass'];
      // $re_post = $_POST['re_pass'];

      if($email == $emailLama){
          echo "<script>alert('Email sudah terdaftar');location='register.php'</script>";
      }else {
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = substr(str_shuffle($permitted_chars), 0, 8);

        $sql = "INSERT INTO user (nama, email, katasandi) VALUES ('$name', '$email', '$randomString')";
        $query = mysqli_query($koneksi, $sql);

        $mail_body = '<div style="text-align:center;">'
          .'<h3>Terima Kasih telah mendaftarkan akun anda</h3>'
          .'<p>Berikut ini merupakan password sementara akun anda : </p>'
          .'<h2 style="background-color:lightgrey;width:150px;margin-left:auto;margin-right:auto; ">'."$randomString".'</h2>'
          .'<p>Silahkan <a href="https://skripsivivi.my.id/login.php">Login</a> pada halaman website dan ganti password anda pada menu Ganti Password.</p>'
          .'<p>Selamat Memesan.</p>'
        .'</div>';
        $mail = new PHPMailer;
        $mail->IsSMTP();
        $mail->SMTPSecure = 'ssl';
        $mail->Host = "smtp.gmail.com"; //host masing2 provider email
        $mail->SMTPDebug = 2;
        $mail->Port = 465;
        $mail->SMTPAuth = true;
        $mail->Username = "novitadwicendaniraya97@gmail.com"; //user email
        $mail->Password = "yygexrocofynbrol"; //password email
        $mail->SetFrom('registrasi@skripsivivi.my.id','PT. Anugrah Tehnik Mandiri'); //set email pengirim
        $mail->Subject = "Selamat Datang"; //subyek email
        $mail->AddAddress("$email","Client");  //tujuan email
        $mail->MsgHTML($mail_body);
        if($mail->Send()) echo "<script>alert('Silahkan mengecek Email anda untuk mendapatkan Password');location='register.php'</script>";
        else echo "<script>alert('Email Gagal Terkirim, Silahkan coba lagi');location='register.php'</script>";
      }
  }



?>
