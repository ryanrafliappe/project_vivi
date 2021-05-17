<div class="container-fluid">
    <h1 class="mt-4">Workshop </h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Workshop</li>
    </ol>

    <!-- notifikasi -->
    <?php if (isset($_SESSION['flashmessage'])) : ?>
        <div class="alert <?= $_SESSION['flashmessage']['warna'] ?> alert-dismissible fade show" role="alert">
            <strong>Berhasil!</strong> <?= $_SESSION['flashmessage']['pesan'] ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php unset($_SESSION['flashmessage']);
            endif ?>
    <!-- batas notifikasi -->

    <div class="card mb-4">
        <div class="card-body">
            <div class="text-left">
                <a href="index.php?page=workshop-add" class="btn btn-primary mb-3 btn-sm" data-toggle="modal" data-target="#tambah"> <i class="fas fa-plus-circle"></i> Tambah</a>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered dataTable" id="" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Barang</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $get = $koneksi->query("SELECT * FROM workshop") ?>
                        <?php $no = 1;
                        while ($data = $get->fetch_assoc()) : ?>
                            <tr>
                                <td class="align-middle"><?= $no ?></td>
                                <td>
                                    <img src="../assets/img/gambar-workshop/<?= $data['barang'] ?>" class="img-fluid" width="100px">
                                </td>
                                <td class="align-middle" style="text-align: center;"><?= $data['status'] ?></td>
                            </tr>
                        <?php $no++;
                        endwhile ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- modal tambah -->

<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Workshop</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Upload File</label><br>
                        <input type="file" name="barang" accept="image/*">
                    </div>
                    <input type="hidden" name="status" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link" style="color:black; text-decoration:none;" data-dismiss="modal">Close</button>
                    <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- php -->

<?php

if (isset($_POST['tambah'])) {

    $file = $_FILES['barang']['name'];
    $tmp = $_FILES['barang']['tmp_name'];

    move_uploaded_file($tmp, "../assets/img/gambar-workshop/" . $file);

    $koneksi->query("INSERT INTO workshop (barang, status) VALUES ('$file','Sedang Dikerjakan')");

    $_SESSION['flashmessage']['pesan'] = 'Data berhasil ditambahkan.';
    $_SESSION['flashmessage']['warna'] = 'alert-success';

    echo "<script>location='?page=workshop'</script>";
}

?>
