<?php

if (isset($_POST['save'])) {
    $profil = $_POST['profil'];


    $koneksi->query("UPDATE `profil` SET `profil`='$profil'");

    $_SESSION['flashmessage']['pesan'] = 'Data berhasil disimpan.';
    $_SESSION['flashmessage']['warna'] = 'alert-success';

    echo "<script>location='?page=profil'</script>";
}
