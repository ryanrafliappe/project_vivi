<?php

if (isset($_POST['tambah'])) {
    $nama = $_FILES['nama']['name'];
    $tmpname = $_FILES['nama']['tmp_name'];
    $jenisSurat = $_POST['jenisSurat'];
    $idpengajuan = $_POST['idpengajuan'];
   
    move_uploaded_file("$tmpname","../assets/dokumen/$nama");

    $koneksi->query("INSERT INTO `pengajuan_project_log`(`id_pengajuan`, `nama_surat`, `jenis_surat`, `status_pengajuan`) VALUES ('$idpengajuan','$nama','$jenisSurat','Menunggu Purchase Order')");

    $_SESSION['flashmessage']['pesan'] = 'Data berhasil ditambahkan.';
    $_SESSION['flashmessage']['warna'] = 'alert-success';

    echo "<script>location='?page=penawaran'</script>";
}
