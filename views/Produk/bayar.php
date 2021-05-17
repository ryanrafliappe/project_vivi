<div class="container">
    <h1 class="mt-4">Pembayaran </h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Pembayaran</li>
    </ol>

    <!-- notifikasi -->
    <?php if (isset($_SESSION['flashmessage'])) : ?>
        <div class="alert <?= $_SESSION['flashmessage']['warna'] ?> alert-dismissible fade show" role="alert">
            <strong>Berhasil!</strong> <?= $_SESSION['flashmessage']['pesan'] ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php unset($_SESSION['flashmessage']);
    endif ?>
    <!-- batas notifikasi -->

    <!-- tetapkan logcode -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">

                        <input type="hidden" name="log_code" value="<?= $_GET['log-code'] ?>">
                        <input type="hidden" name="id_user" value="<?= $_SESSION['login']['id'] ?>">
                        <input type="hidden" name="id_produk" value="<?= $_GET['id-produk'] ?>">
                        <input type="hidden" name="harga" value="<?= $_GET['harga'] ?>">
                        <input type="hidden" name="terbilang" value="<?= $_GET['terbilang'] ?>">

                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" value="<?= $_SESSION['login']['nama'] ?>" name="nama" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" value="<?= $_SESSION['login']['email'] ?>" name="email" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Upload Surat Bukti Pembayaran</label>
                            <input type="file" id="upload" class="custom-file" name="file"  required accept="image/*" onchange="uploadGambar()">
                        </div>
                        <div class="form-group text-right">
                            <a href="?page=produk" class="btn">Kembali</a>
                            <button class="btn btn-primary" type="submit" name="kirim">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
  if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
  }

  function uploadGambar(){
    var tipeDokumen = document.getElementById("upload").value;
    var res1 = tipeDokumen.match(".jpg");
    var res2 = tipeDokumen.match(".jpeg");
    var res3 = tipeDokumen.match(".png");
    var res4 = tipeDokumen.match(".JPG");
    var res5 = tipeDokumen.match(".JPEG");
    var res6 = tipeDokumen.match(".PNG");

    if (res1 ){
      // alert("Maaf, Hanya dapat mengupload gambar");
      alert("Foto terupload");
      // document.getElementById("upload").value="";
    }else if (res2 ){
      alert("Foto terupload");
    }else if (res3 ){
      alert("Foto terupload");
    }else if (res4 ){
      alert("Foto terupload");
    }else if (res5 ){
      alert("Foto terupload");
    }else if (res6 ){
      alert("Foto terupload");
    }else {
      alert("Maaf, Hanya dapat mengupload gambar");
      document.getElementById("upload").value="";
    }
  }
</script>

<?php
if (isset($_POST['kirim'])) {
    $id_user = $_POST['id_user'];
    $id_produk = $_POST['id_produk'];
    $harga = $_POST['harga'];
    $terbilang = $_POST['terbilang'];
    $date = date('d F Y');

    $log_code = $_POST['log_code'];

    $file = $_FILES['file']['name'];
    $tmpname = $_FILES['file']['tmp_name'];

    $pecah = explode(".", $file);
    $ekstensi = $pecah[1];

    $file = $log_code . "." . $ekstensi;

    $jenisSurat = "Surat Bukti Pembayaran";

    move_uploaded_file("$tmpname", "../assets/dokumen/$file");

    $koneksi->query("INSERT INTO `produk_log`(`id_user`, `id_produk`, `log_code`, nama_perusahaan, alamat_perusahaan, kota, harga, terbilang, `jenis_surat`,`nama_surat`, date) VALUES ('$id_user','$id_produk','$log_code','PT. Anugrah Teknik Mandiris', 'Komp. Ruko New Zamrud F.17 Jl. A.P. Pettarani Makassar', 'Makassar', '$harga','$terbilang', '$jenisSurat','$file', '$date')");

    $koneksi->query("UPDATE `produk_log` SET status_log = 'Menunggu Konfirmasi' WHERE id_user = '$id_user'");

    $_SESSION['flashmessage']['pesan'] = 'Data berhasil ditambahkan.';
    $_SESSION['flashmessage']['warna'] = 'alert-success';

    echo "<script>location='?page=produk-riwayat'</script>";

}
