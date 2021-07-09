<!DOCTYPE html>
<html>
<body>
<?php include "classes/class.phpmailer.php"; ?>
<p>Click the button to display an alert box.</p>

<button onclick="myFunction()">Try it</button>

<script>
function myFunction() {
  alert("Hello! I am an alert box!");
}
</script>
<?php
  $TombolFilter = $_POST['status'];
  $status ="Tombol belum ditekan";
 ?>

<form class="" action="" method="post">
  <input type="hidden" name="status" value="ya">
  <button type="submit" name="filter" >Filter</button>
</form>

<form class="" action="" method="post">
  <label>EMAIL</label>
  <input type="email" name="email" value="">
  <button type="button" name="submit" onclick="clicked()">SUBMIT</button>
</form>

<?php

$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$randomString = substr(str_shuffle($permitted_chars), 0, 8);

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
$mail->Host = "skripsivivi.my.id"; //host masing2 provider email
$mail->SMTPDebug = 2;
$mail->Port = 465;
$mail->SMTPAuth = true;
$mail->Username = "registrasi@skripsivivi.my.id"; //user email
$mail->Password = "123456asdqwe"; //password email
$mail->SetFrom('registrasi@skripsivivi.my.id','PT. Anugrah Tehnik Mandiri'); //set email pengirim
// $mail->addReplyTo('registrasi@skripsivivi.my.id', 'PT. Anugrah Tehnik');
$mail->Subject = "Selamat Datang"; //subyek email
$mail->AddAddress("ariefw2211997@gmail.com","Client");  //tujuan email
$mail->MsgHTML("$mail_body");
if($mail->Send()) echo "Message has been sent";
else echo "Failed to sending message";
?>
</html>
