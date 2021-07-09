<?php
include "classes/class.phpmailer.php";
$mail_body = '<div style="text-align:center;">'
  .'<h3>Terima Kasih telah mendaftarkan akun anda</h3>'
  .'<p>Berikut ini merupakan password sementara akun anda : </p>'
  .'<h2 style="background-color:lightgrey;width:150px;margin-left:auto;margin-right:auto; ">HAGyg21</h2>'
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
$mail->SetFrom("registrasi@skripsivivi.my.id","PT. Anugrah Tehnik Mandiri"); //set email pengirim
$mail->Subject = "Selamat Datang Client "; //subyek email
$mail->AddAddress("icol3spam@gmail.com","Client");  //tujuan email
$mail->MsgHTML($mail_body);
if($mail->Send()) echo "Message has been sent";
else echo "Failed to sending message";
?>
