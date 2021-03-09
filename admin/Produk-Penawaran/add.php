<?php

if (isset($_POST['tambah'])) {

    $jenisSurat = $_POST['jenisSurat'];
    $id_user = $_POST['id_user'];
    $id_produk = $_POST['id_produk'];
    $log_code = $_POST['log_code'];
    $nama_perusahaan = $_POST['nama_perusahaan'];
    $alamat_perusahaan = $_POST['alamat_perusahaan'];


    $kota = $_POST['kota'];
    $date = date('d F Y');

    if ($jenisSurat == "INVOICE") {
    $terbilangs = $_POST['terbilang'];
    $hargas = $_POST['harga'];
    $status_log = "Menunggu Pembayaran";

        $koneksi->query("INSERT INTO `produk_log`(`id_user`, `id_produk`, `log_code`, `nama_perusahaan`, `alamat_perusahaan`,
        `kota`, `nama_surat`, harga, terbilang, `jenis_surat`, `status_log`, `date`) 
        VALUES ('$id_user','$id_produk','$log_code', '$nama_perusahaan',
         '$alamat_perusahaan', '$kota', 'INVOICE', '$hargas', '$terbilangs', '$jenisSurat','$status_log', '$date')");

        $koneksi->query("UPDATE `produk_log` SET status_log = '$status_log' WHERE log_code = '$log_code'");
        
    } else if ($jenisSurat == "SURAT PENAWARAN HARGA") {

        $sl = "Menunggu Purchace Order";
        $harga = $_POST['hargas'];
        $terbilang = $_POST['terbilangs'];

        $koneksi->query("INSERT INTO `produk_log`(`id_user`, `id_produk`, `log_code`, `nama_perusahaan`,
         `alamat_perusahaan`, `kota`, `nama_surat`, harga, terbilang, `jenis_surat`, `status_log`, `date`)
          VALUES ('$id_user','$id_produk','$log_code', '$nama_perusahaan',
           '$alamat_perusahaan', '$kota', 'SURAT PENAWARAN HARGA', '$harga', '$terbilang', '$jenisSurat','$sl', '$date')");

        $koneksi->query("UPDATE `produk_log` SET status_log = '$sl', harga='$harga', terbilang='$terbilang' WHERE log_code = '$log_code'");
    } else {
        $status_log = "Menunggu Purchase Order";
    }

    $_SESSION['flashmessage']['pesan'] = 'Data berhasil ditambahkan.';
    $_SESSION['flashmessage']['warna'] = 'alert-success';

    echo "<script>location='?page=produk-penawaran'</script>";
}
