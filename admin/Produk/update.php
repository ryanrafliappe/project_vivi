<?php

if (!isset($_GET['id'])) {
}

$id = $_GET['id'];

$sql = "SELECT * FROM produk WHERE id=$id";
$query = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_assoc($query);

?>

<div class="container-fluid">
    <h1 class="mt-4">Ubah Produk </h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="?page=produk">Produk</a></li>
        <li class="breadcrumb-item active">Ubah Produk</li>
    </ol>

    <form action="" method="post" enctype="multipart/form-data" class="mt-4">
        <input type="hidden" name="id" class="custom-control" value="<?php echo $data['id'] ?>">
        <div class="form-group">
            <label for="">Upload Foto</label>
            <input type="file" name="foto" class="custom-control" value="<?php echo $data['foto'] ?>">
        </div>
        <div class="form-group">
            <label for="">Item Description</label>
            <input type="text" name="item_desc" class="form-control" value="<?php echo $data['item_desc'] ?>">
        </div>
        <div class="form-group">
            <label for="">Spesifikasi</label>
            <textarea name="spesifikasi" class="form-control" rows="5"><?php echo $data['spesifikasi'] ?></textarea>
        </div>
        <div class="form-group">
            <label for="">Harga Satuan</label>
            <input type="text" name="harga" class="form-control" value="<?php echo $data['harga'] ?>">
        </div>



        <div class="form-group text-right">
            <a href="?page=artikel" class="btn"><i class="fas fa-times"></i> Cancel</a>
            <button type="submit" name="ubah" class="btn btn-warning"> <i class="fas fa-pen"></i> Ubah</button>
        </div>
    </form>

</div>

<?php

if (isset($_POST['ubah'])) {
    $id = $_POST['id'];
    $spesifikasi = strtr($_POST['spesifikasi'], array("\r\n" => '<br />', "\r" => '<br />', "\n" => '<br />'));
    $item_desc = $_POST['item_desc'];
    $harga = $_POST['harga'];
    $nmfoto = $_FILES['foto']['name'];
    $tmpfoto = $_FILES['foto']['tmp_name'];

    if (!empty($nmfoto)) {
        move_uploaded_file($tmpfoto, "../assets/img/gambar-produk/" . $nmfoto);
        $koneksi->query("UPDATE produk SET `item_desc`='$item_desc', spesifikasi='$spesifikasi', `harga`='$harga', `foto`='$nmfoto' WHERE id=$id");
    } else {
        $koneksi->query("UPDATE produk SET `item_desc`='$item_desc', spesifikasi='$spesifikasi', `harga`='$harga' WHERE id=$id");
    }

    $_SESSION['flashmessage']['pesan'] = 'Data berhasil diubah.';
    $_SESSION['flashmessage']['warna'] = 'alert-success';

    echo "<script>location='?page=produk'</script>";
}
?>