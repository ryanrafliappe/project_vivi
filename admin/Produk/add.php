<div class="container-fluid">
    <h1 class="mt-4">Tambah Produk </h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="?page=produk">Produk</a></li>
        <li class="breadcrumb-item active">Tambah Produk</li>
    </ol>

    <form action="" method="post" enctype="multipart/form-data" class="mt-4">
        <div class="form-group">
            <label for="">Upload Foto 1</label>
            <input type="file" name="fotoa" class="custom-control" accept="image/*" accept="image/*" required>
        </div>
        <div class="form-group">
            <label for="">Upload Foto 2</label>
            <input type="file" name="fotob" class="custom-control" accept="image/*">
        </div>
        <div class="form-group">
            <label for="">Upload Foto 3</label>
            <input type="file" name="fotoc" class="custom-control" accept="image/*">
        </div>
        <div class="form-group">
            <label for="">Upload Foto 4</label>
            <input type="file" name="fotod" class="custom-control" accept="image/*">
        </div>
        <div class="form-group">
            <label for="">Item Description</label>
            <input type="text" name="item_desc" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Spesifikasi</label>
            <!-- <input type="text" name="spesifikasi" class="form-control"> -->
            <textarea name="spesifikasi" class="form-control" rows="5"></textarea>
        </div>
        <div class="form-group">
            <label for="">Harga Satuan</label>
            <input type="text" name="harga" class="form-control">
        </div>
        <div class="form-group text-right">
            <a href="?page=artikel" class="btn"><i class="fas fa-times"></i> Cancel</a>
            <button type="submit" name="save" class="btn btn-primary"> <i class="fas fa-save"></i> Save</button>
        </div>

    </form>

</div>

<?php

if (isset($_POST['save'])) {
    $spesifikasi    = strtr($_POST['spesifikasi'], array("\r\n" => '<br />', "\r" => '<br />', "\n" => '<br />'));
    $item_desc      = $_POST['item_desc'];
    $harga          = $_POST['harga'];
    $nmfoto         = $_FILES['fotoa']['name'];
    $nmfotob        = $_FILES['fotob']['name'];
    $nmfotoc        = $_FILES['fotoc']['name'];
    $nmfotod        = $_FILES['fotod']['name'];
    $tmpfoto        = $_FILES['fotoa']['tmp_name'];
    $tmpfotob       = $_FILES['fotob']['tmp_name'];
    $tmpfotoc       = $_FILES['fotoc']['tmp_name'];
    $tmpfotod       = $_FILES['fotod']['tmp_name'];
    $error          = $_FILES['foto']['error'];
    $nmfoto         = uniqid() . $nmfoto;

    if ($nmfotob != null) {
        $nmfotob        = uniqid() . $nmfotob;
    } else {
        $nmfotob = '-';
    }

    if ($nmfotoc != null) {
        $nmfotoc        = uniqid() . $nmfotoc;
    } else {
        $nmfotoc = '-';
    }

    if ($nmfotod != null) {
        $nmfotod        = uniqid() . $nmfotod;
    } else {
        $nmfotod = '-';
    }

    if ($error == "4") {
    } else {
        move_uploaded_file($tmpfoto, "../assets/img/gambar-produk/" . $nmfoto);
        move_uploaded_file($tmpfotob, "../assets/img/gambar-produk/" . $nmfotob);
        move_uploaded_file($tmpfotoc, "../assets/img/gambar-produk/" . $nmfotoc);
        move_uploaded_file($tmpfotod, "../assets/img/gambar-produk/" . $nmfotod);
        $koneksi->query("INSERT INTO `produk`(`item_desc`,spesifikasi, `foto`, `fotob`, `fotoc`, `fotod`, `harga`)
         VALUES ('$item_desc','$spesifikasi','$nmfoto', '$nmfotob', '$nmfotoc', '$nmfotod', '$harga')");
    }

    $_SESSION['flashmessage']['pesan'] = 'Data berhasil ditambahkan.';
    $_SESSION['flashmessage']['warna'] = 'alert-success';

    echo "<script>location='?page=produk'</script>";
}
?>
