<div class="container-fluid">
    <h1 class="mt-4">Tambah Mitra </h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="?page=mitra">Mitra</a></li>
        <li class="breadcrumb-item active">Tambah Mitra</li>
    </ol>

    <form action="" method="post" enctype="multipart/form-data" class="mt-4">
        <div class="form-group">
            <label for="">Nama Mitra</label>
            <input type="text" name="nama" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Profil Singkat</label>
           <textarea name="profil" class="ckeditor" rows="10"></textarea>
        </div>
        <div class="form-group text-right">
            <a href="?page=mitra" class="btn"><i class="fas fa-times"></i> Cancel</a>
            <button type="submit" name="save" class="btn btn-primary"> <i class="fas fa-save"></i> Save</button>
        </div>
    </form>

</div>

<?php

if (isset($_POST['save'])) {
    $nama = $_POST['nama'];
    $profil = $_POST['profil'];
   
    $koneksi->query("INSERT INTO mitra (nama,profil) VALUES ('$nama','$profil')");

    $_SESSION['flashmessage']['pesan'] = 'Data berhasil ditambahkan.';
    $_SESSION['flashmessage']['warna'] = 'alert-success';

    echo "<script>location='?page=mitra'</script>";
}
