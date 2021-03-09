<div class="container-fluid">
    <h1 class="mt-4">Tambah Galeri </h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="?page=galeri">Galeri</a></li>
        <li class="breadcrumb-item active">Tambah Galeri</li>
    </ol>

    <form action="" method="post" enctype="multipart/form-data" class="mt-4">
        <div class="form-group">
            <label for="">Kategori</label><br>
            <select name="kategori" class="custom-select col-md-4" id="validationCustom04" required>
                <option value="Produk">Produk</option>
                <option value="Project">Project</option>
            </select>
        </div>
        <div class="form-group">
            <label for="">Upload Foto</label>
            <input type="file" name="foto" class="custom-control" required>
        </div>
        <div class="form-group">
            <label for="">Keterangan</label>
            <textarea name="keterangan" class="ckeditor" cols="30" rows="10"></textarea>
        </div>
        <div class="form-group text-right">
            <a href="?page=galeri" class="btn"><i class="fas fa-times"></i> Cancel</a>
            <button type="submit" name="save" class="btn btn-primary"> <i class="fas fa-save"></i> Save</button>
        </div>
    </form>

</div>

<?php

if (isset($_POST['save'])) {

    $keterangan = $_POST['keterangan'];
    $kategori = $_POST['kategori'];
    $nmfoto = $_FILES['foto']['name'];
    $tmpfoto = $_FILES['foto']['tmp_name'];
    $error = $_FILES['foto']['error'];
    $nmfoto = uniqid() . $nmfoto;
    $tanggal = date("Y-m-d H:i:s");

    if ($error == "4") {
    } else {
        move_uploaded_file($tmpfoto, "../assets/img/" . $nmfoto);
        $koneksi->query("INSERT INTO `galeri`(`foto`, `kategori`, `keterangan`, `tanggal`)
         VALUES ('$nmfoto', '$kategori', '$keterangan', '$tanggal')");
    }


    $_SESSION['flashmessage']['pesan'] = 'Data berhasil ditambahkan.';
    $_SESSION['flashmessage']['warna'] = 'alert-success';

    echo "<script>location='?page=galeri'</script>";
}
