<?php

    $id = $_GET['id'];

    $sql = "UPDATE project SET status = 'Terima' WHERE id='$id'";
    $query = mysqli_query($koneksi, $sql);

    $_SESSION['flashmessage']['pesan'] = 'Berhasil Melakukan Konfirmasi.';
    $_SESSION['flashmessage']['warna'] = 'alert-success';

    echo "<script>location='?page=projek'</script>";
?>