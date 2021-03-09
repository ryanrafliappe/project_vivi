<?php

if (!isset($_GET['id'])) {
}

$id = $_GET['id'];

$sql = "SELECT * FROM mitra WHERE id=$id";
$query = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_assoc($query);


?>


<div class="container-fluid">
    <h1 class="mt-4">Ubah Mitra </h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="?page=mitra">Mitra</a></li>
        <li class="breadcrumb-item active">Ubah Mitra</li>
    </ol>

    <form action="" method="post" enctype="multipart/form-data" class="mt-4">
        <input type="hidden" name="id" value="<?php echo $data['id'] ?>"  class="form-control">
        <div class="form-group">
            <label for="">Nama Mitra</label>
            <input type="text" name="nama" class="form-control" value="<?php echo $data['nama'] ?>">
        </div>
        <div class="form-group">
            <label for="">Profil Singkat</label>
            <textarea name="profil" class="ckeditor" rows="10"><?php echo $data['profil'] ?></textarea>
        </div>
        <div class="form-group text-right">
            <a href="?page=mitra" class="btn"><i class="fas fa-times"></i> Cancel</a>
            <button type="submit" name="ubah" class="btn btn-warning"> <i class="fas fa-pen"></i> Ubah</button>
        </div>
    </form>

</div>

<?php

if (isset($_POST['ubah'])) {
    $nama = $_POST['nama'];
    $profil = $_POST['profil'];

    $koneksi->query("UPDATE mitra SET nama='$nama', profil='$profil' WHERE id=$id");

    $_SESSION['flashmessage']['pesan'] = 'Data berhasil diubah.';
    $_SESSION['flashmessage']['warna'] = 'alert-success';

    echo "<script>location='?page=mitra'</script>";
}
