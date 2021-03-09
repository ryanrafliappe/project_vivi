<?php

    $id = $_GET['id'];

    $sql = "DELETE FROM mitra where id='$id'";
    $query = mysqli_query($koneksi, $sql);

    $_SESSION['flashmessage']['pesan'] = 'Data berhasil dihapus.';
    $_SESSION['flashmessage']['warna'] = 'alert-success';
    echo "<script>location='index.php?page=mitra&id=$id';</script>";

?>