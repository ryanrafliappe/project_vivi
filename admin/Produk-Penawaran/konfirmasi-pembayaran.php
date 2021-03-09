<?php

$log_code = $_GET['logcode'];
$itemdesc = $_GET['itemdesc'];

$koneksi->query("UPDATE `produk_log` SET status_log = 'SELESAI' WHERE log_code = '$log_code'");

$_SESSION['flashmessage']['pesan'] = 'Data berhasil ditambahkan.';
$_SESSION['flashmessage']['warna'] = 'alert-success';

echo "<script>location='?page=produk-penawaran-detail&logcode=$log_code&itemdesc=$itemdesc'</script>";
