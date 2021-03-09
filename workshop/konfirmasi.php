<?php

session_start();

include "../conf/koneksi.php";
if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $koneksi->query("UPDATE workshop SET status='SELESAI' WHERE id='$id' ");

    $_SESSION['flashmessage']['pesan'] = 'Telah dikonfirmasi.';
    $_SESSION['flashmessage']['warna'] = 'alert-success';

    echo "<script>location='index.php'</script>";
}
?>