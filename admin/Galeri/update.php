<?php

if (!isset($_GET['id'])) {
}

$id = $_GET['id'];

$sql = "SELECT * FROM galeri WHERE id=$id";
$query = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_assoc($query);

?>


<div class="container-fluid">
    <h1 class="mt-4">Ubah Galeri </h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="?page=galeri">Galeri</a></li>
        <li class="breadcrumb-item active">Ubah Galeri</li>
    </ol>

    <form action="" method="post" enctype="multipart/form-data" class="mt-4">
        <div class="form-group">
        <input type="hidden" name="id" class="custom-control" required value="<?= $data['id'] ?>">
            <label for="">Kategori</label><br>
            <select name="kategori" value="<?= $data['kategori'] ?>" class="custom-select col-md-2" id="validationCustom04" required>
                <option value="Produk">Produk</option>
                <option value="Project">Project</option>
            </select>
        </div>
        <div class="form-group">
            <label for="">Upload Foto</label>
            <input type="file" name="foto" class="custom-control" value="<?= $data['foto'] ?>">
        </div>
        <div class="form-group">
            <label for="">Keterangan</label>
            <textarea name="keterangan" class="ckeditor" cols="30" rows="10"><?php echo $data['keterangan'] ?></textarea>
        </div>
        <div class="form-group text-right">
            <a href="?page=galeri" class="btn"><i class="fas fa-times"></i> Cancel</a>
            <button type="submit" name="ubah" class="btn btn-warning"> <i class="fas fa-pen"></i> Ubah</button>
        </div>
    </form>

</div>

<?php

if (isset($_POST['ubah'])) {

    $id = $_POST['id'];
    $keterangan = $_POST['keterangan'];
    $kategori = $_POST['kategori'];
    $nmfoto = $_FILES['foto']['name'];
    $tmpfoto = $_FILES['foto']['tmp_name'];
    $tanggal = date("Y-m-d H:i:s");

    if (!empty($nmfoto)) {
        move_uploaded_file($tmpfoto, "../assets/img/" . $nmfoto);
        $koneksi->query("UPDATE galeri SET keterangan='$keterangan', kategori='$kategori', foto='$nmfoto' WHERE id=$id"); 
    }else{
        $koneksi->query("UPDATE galeri SET keterangan='$keterangan', kategori='$kategori' WHERE id=$id"); 
    }


    $_SESSION['flashmessage']['pesan'] = 'Data berhasil diubah.';
    $_SESSION['flashmessage']['warna'] = 'alert-success';

    echo "<script>location='?page=galeri'</script>";
}
