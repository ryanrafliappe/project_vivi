<div class="container-fluid">
    <h1 class="mt-4">Tambah Riwayat Pekerjaan </h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="?page=riwayat-pekerjaan">Riwayat Pekerjaan</a></li>
        <li class="breadcrumb-item active">Tambah Riwayat Pekerjaan</li>
    </ol>

    <form action="" method="post" enctype="multipart/form-data" class="mt-4">
        <div class="form-group">
            <label for="">Lokasi</label>
            <input type="text" name="lokasi" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Nama Pekerjaan</label>
            <input type="text" name="nama_pekerjaan" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Nama Client</label>
            <input type="text" name="nama_client" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Waktu Pelaksanaan</label>
            <input type="date" name="waktu_pelaksanaan" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Fee</label>
            <input type="text" name="fee" class="form-control">
        </div>
        <div class="form-group text-right">
            <a href="?page=artikel" class="btn"><i class="fas fa-times"></i> Cancel</a>
            <button type="submit" name="save" class="btn btn-primary"> <i class="fas fa-save"></i> Save</button>
        </div>
    </form>
</div>

<div class="mb-4"></div>

<?php

if (isset($_POST['save'])) {
    $lokasi = $_POST['lokasi'];
    $nama_pekerjaan = $_POST['nama_pekerjaan'];
    $nama_client = $_POST['nama_client'];
    $waktu_pelaksanaan = $_POST['waktu_pelaksanaan'];
    $fee = $_POST['fee'];

    $koneksi->query("INSERT INTO riwayat_pekerjaan (lokasi, nama_pekerjaan, nama_client, waktu_pelaksanaan, fee)
     VALUES ('$lokasi', '$nama_pekerjaan', '$nama_client', '$waktu_pelaksanaan', '$fee')");

    $_SESSION['flashmessage']['pesan'] = 'Data berhasil ditambahkan.';
    $_SESSION['flashmessage']['warna'] = 'alert-success';

    echo "<script>location='?page=riwayat-pekerjaan'</script>";
}
?>