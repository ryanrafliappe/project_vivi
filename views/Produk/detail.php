<div class="container">
    <h1 class="mt-4">Detail Produk </h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item ">Produk</li>
        <li class="breadcrumb-item active">Detail</li>

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
    <?php
    $logCode = date("dmYHis");
    ?>

    <div class="row">
        <div class="col-lg-5">
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <div class="text-muted">Produk Log Code</div>
                    <div class="h5 mb-4"><?= $logCode ?></div>
                    <div class="text-muted">Item Number</div>
                    <div class="h5 mb-4"><?= strtoupper("VIVI - " . $_GET['idproduk']) ?></div>
                    <div class="text-muted">Item Description</div>
                    <div class="h5 mb-4"><?= $_GET['itemdesc'] ?></div>
                    <div class="text-muted">Spesifikasi</div>
                    <div class="mb-1"><?= $_GET['spesifikasi'] ?></div>
                </div>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">

                        <input type="hidden" name="log_code" value="<?= $logCode ?>">
                        <input type="hidden" name="id_user" value="<?= $_SESSION['login']['id'] ?>">
                        <input type="hidden" name="id_produk" value="<?= $_GET['idproduk'] ?>">

                        <div class="form-group">
                            <label for="">Nama Perusahaan</label>
                            <input type="text" value="PT. " name="nama_perusahaan" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Alamat Perusahaan</label>
                            <input type="text" value="Makassar" name="alamat_perusahaan" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Kota</label>
                            <input type="text" value="Kota" name="kota" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Upload Surat Permohonan</label>
                            <input type="file" class="custom-file" name="file">
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

<?php
if (isset($_POST['kirim'])) {
    $id_user = $_POST['id_user'];
    $id_produk = $_POST['id_produk'];
    $nama = $_POST['nama_perusahaan'];
    $alamat = $_POST['alamat_perusahaan'];
    $kota = $_POST['kota'];
    $log_code = $_POST['log_code'];
    $date = date('d F Y');

    $file = $_FILES['file']['name'];
    $tmpname = $_FILES['file']['tmp_name'];

    $pecah = explode(".", $file);
    $ekstensi = $pecah[1];

    $file = $log_code . "." . $ekstensi;

    $jenisSurat = "Surat Permohonan";

    move_uploaded_file("$tmpname", "../assets/dokumen/$file");

    $koneksi->query("INSERT INTO `produk_log`(`id_user`, `id_produk`, `log_code`,
     `nama_perusahaan`, `alamat_perusahaan`, `kota`, harga, terbilang, `nama_surat`, `jenis_surat`, `date`) VALUES 
     ('$id_user','$id_produk','$log_code','$nama','$alamat','$kota', '-', '-', '$file','$jenisSurat','$date')");

    $_SESSION['flashmessage']['pesan'] = 'Data berhasil ditambahkan.';
    $_SESSION['flashmessage']['warna'] = 'alert-success';

    echo "<script>location='?page=produk-riwayat'</script>";
}
