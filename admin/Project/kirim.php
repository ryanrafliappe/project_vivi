<div class="container">
    <h1 class="mt-4">Detail Project </h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item "><a href="?page=project">Project</a></li>
        <li class="breadcrumb-item active">Detail</li>

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

    <!-- tetapkan logcode -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <?php

                    // $id = $_GET['id'];
                    $idp = strtoupper($_GET['id']);

                    $sql = "SELECT * FROM project WHERE id = $idp";
                    $query = mysqli_query($koneksi, $sql);
                    $data = mysqli_fetch_assoc($query);

                    ?>

                    <form action="?page=project-update" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $data['id'] ?>" class="form-control">
                        <div class="form-group">
                            <!-- <label for="">Nama</label> -->
                            <input type="hidden" value="<?= $data['nama'] ?>" name="nama" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <!-- <label for="">Email</label> -->
                            <input type="hidden" value="<?= $data['email'] ?>" name="email" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Upload Surat Balasan</label>
                            <input type="file" class="custom-file" name="surat_balasan" required>
                        </div>
                        <div class="form-group text-right">
                            <a href="?page=project" class="btn">Kembali</a>
                            <button class="btn btn-primary" type="submit" name="kirim">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
