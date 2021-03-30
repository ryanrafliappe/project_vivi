<?php

$log_code = $_GET['logcode'];
$itemdesc = $_GET['itemdesc'];

$queryemail = $koneksi->query("SELECT user.email as email FROM `user` JOIN `produk_log` ON user.id = produk_log.id_user WHERE produk_log.log_code = '$log_code'");
$email = $queryemail->fetch_assoc();
$emailclient = $email['email'];

$koneksi->query("UPDATE `produk_log` SET status_log = 'SELESAI' WHERE log_code = '$log_code'");

$koneksi->query("DELETE FROM `chat` WHERE pengirim = '$emailclient' OR penerima = '$emailclient'");
$koneksi->query("DELETE FROM `user_chat` WHERE email = '$emailclient'");

$_SESSION['flashmessage']['pesan'] = 'Data berhasil ditambahkan.';
$_SESSION['flashmessage']['warna'] = 'alert-success';

echo "<script>location='?page=produk-penawaran-detail&logcode=$log_code&itemdesc=$itemdesc'</script>";
