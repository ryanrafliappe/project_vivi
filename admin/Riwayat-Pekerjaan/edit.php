<?php

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $sql = "SELECT * FROM riwayat_pekerjaan WHERE id='$id' ";
    $query = mysqli_query($koneksi, $sql);

    $data = mysqli_fetch_assoc($query);
}
?>

<div class="container-fluid">
    <h1 class="mt-4">Edit Riwayat Pekerjaan </h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="?page=riwayat-pekerjaan">Riwayat Pekerjaan</a></li>
        <li class="breadcrumb-item active">Edit Riwayat Pekerjaan</li>
    </ol>

    <form action="" method="POST" enctype="multipart/form-data" class="mt-4">
        <div class="form-group">
            <input type="hidden" name="id" value="<?= $data['id'] ?>" class="form-control">
            <label for="">Lokasi</label>
            <input type="text" name="lokasi" value="<?= $data['lokasi'] ?>" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Nama Pekerjaan</label>
            <input type="text" name="nama_pekerjaan" value="<?= $data['nama_pekerjaan'] ?>" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Nama Client</label>
            <input type="text" name="nama_client" value="<?= $data['nama_client'] ?>" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Waktu Pelaksanaan</label>
            <input type="date" name="waktu_pelaksanaan" value="<?= $data['waktu_pelaksanaan'] ?>" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Fee</label>
            <input type="text" name="fee" value="<?= $data['fee'] ?>" class="form-control">
        </div>
        <div class="form-group text-right">
            <a href="?page=artikel" class="btn"><i class="fas fa-times"></i> Cancel</a>
            <button type="submit" name="ubah" class="btn btn-primary"> <i class="fas fa-save"></i> Save</button>
        </div>
    </form>
</div>

<div class="mb-4"></div>

<?php

if (isset($_POST['ubah'])) {
    $idu = $_POST['id']; 
    $lokasi = $_POST['lokasi'];
    $nama_pekerjaan = $_POST['nama_pekerjaan'];
    $nama_client = $_POST['nama_client'];
    $waktu_pelaksanaan = $_POST['waktu_pelaksanaan'];
    $fee = $_POST['fee'];

    $koneksi->query("UPDATE riwayat_pekerjaan SET lokasi='$lokasi', nama_pekerjaan='$nama_pekerjaan', nama_client='$nama_client',
    waktu_pelaksanaan='$waktu_pelaksanaan', fee='$fee' WHERE id='$idu' ");

    $_SESSION['flashmessage']['pesan'] = 'Data berhasil diubah.';
    $_SESSION['flashmessage']['warna'] = 'alert-success';

    echo "<script>location='?page=riwayat-pekerjaan'</script>";
}
?>

?>