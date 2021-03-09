<div class="container-fluid">
    <h1 class="mt-4">Tambah Project </h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="?page=project">Project</a></li>
        <li class="breadcrumb-item active">Tambah Project</li>
    </ol>

    <form action="" method="post" enctype="multipart/form-data" class="mt-4">
        <div class="form-group">
            <label for="">Judul</label>
            <input type="text" name="judul" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Deskripsi</label>
            <textarea type="text" name="deskripsi" class="form-control ckeditor"></textarea>
            <small id="emailHelp" class="form-text text-muted">Isi dengan ruang lingkup project, spesifikasi, menu-menu yang harus ada, tools, dsb.</small>
        </div>
        <div class="form-group">
            <label for="">Durasi Pengerjaan (Hari)</label>
            <input type="text" name="durasi" class="form-control" value="7">
            <small id="emailHelp" class="form-text text-muted">Batas Maksimum Pengerjaan, dalam Hari</small>
        </div>
        <div class="form-row">
            <div class="form-group col-6">
                <label for="">Biaya Pengerjaan Minimum (Rp)</label>
                <input type="text" name="biayaminimal" class="form-control" value="500000">
            </div>
            <div class="form-group col-6">
                <label for="">Biaya Pengerjaan Maksimum (Rp)</label>
                <input type="text" name="biayamaksimal" class="form-control" value="1000000">
            </div>
        </div>

        <div class="form-group text-right">
            <a href="?page=project" class="btn"><i class="fas fa-times"></i> Cancel</a>
            <button type="submit" name="save" class="btn btn-primary"> <i class="fas fa-save"></i> Save</button>
        </div>
    </form>

</div>

<?php

if (isset($_POST['save'])) {
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $durasi = $_POST['durasi'];
    $biayaminimal = $_POST['biayaminimal'];
    $biayamaksimal = $_POST['biayamaksimal'];


    $koneksi->query("INSERT INTO `project`(`judul`, `deskripsi`, `durasi`, `biayamin`, `biayamax`) VALUES ('$judul','$deskripsi','$durasi','$biayaminimal','$biayamaksimal')");

    $_SESSION['flashmessage']['pesan'] = 'Data berhasil ditambahkan.';
    $_SESSION['flashmessage']['warna'] = 'alert-success';

    echo "<script>location='?page=project'</script>";
}
