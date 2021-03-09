<div class="container-fluid">
    <h1 class="mt-4">Tambah Produk </h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="?page=produk">Produk</a></li>
        <li class="breadcrumb-item active">Tambah Produk</li>
    </ol>

    <form action="" method="post" enctype="multipart/form-data" class="mt-4">
        <div class="form-group">
            <label for="">Upload Foto</label>
            <input type="file" name="foto" class="custom-control" required>
        </div>
        <div class="form-group">
            <label for="">Item Description</label>
            <input type="text" name="item_desc" class="form-control">
        </div>



        <div class="form-group text-right">
            <a href="?page=artikel" class="btn"><i class="fas fa-times"></i> Cancel</a>
            <button type="submit" name="save" class="btn btn-primary"> <i class="fas fa-save"></i> Save</button>
        </div>
    </form>

</div>

<?php

if (isset($_POST['save'])) {
    $item_desc = $_POST['item_desc'];
    $nmfoto = $_FILES['foto']['name'];
    $tmpfoto = $_FILES['foto']['tmp_name'];
    $error = $_FILES['foto']['error'];
    $nmfoto = uniqid() . $nmfoto;

    if ($error == "4") {
    } else {
        move_uploaded_file($tmpfoto, "../assets/img/gambar-produk/" . $nmfoto);
        $koneksi->query("INSERT INTO `produk`(`item_desc`, `foto`) VALUES ('$item_desc','$nmfoto')");
    }

    $_SESSION['flashmessage']['pesan'] = 'Data berhasil ditambahkan.';
    $_SESSION['flashmessage']['warna'] = 'alert-success';

    echo "<script>location='?page=produk'</script>";
}
?>