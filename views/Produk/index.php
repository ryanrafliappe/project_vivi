<div class="container">
    <h1 class="mt-4">Produk </h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Produk</li>
    </ol>

    <!-- ini test commit -->
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

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered dataTable" id="" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Item Number</th>
                            <th>Image</th>
                            <th>Item Description</th>
                            <th>spesifikasi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $get = $koneksi->query("SELECT * FROM produk") ?>
                        <?php
                        while ($data = $get->fetch_assoc()) : ?>
                            <tr>
                                <td class="align-middle" width="14%">VIVI - <?= $data['id'] ?></td>
                                <td width="20%">
                                    <img src="../assets/img/gambar-produk/<?= $data['foto'] ?>" alt="" class="img-fluid" width="300px">
                                </td>
                                <td class="align-middle" width="17%"><?= $data['item_desc'] ?></td>
                                <td class="align-middle" width="15%"><?= $data['spesifikasi'] ?></td>
                                <td class="text-center align-middle">
                                    <?php
                                    if (isset($_SESSION['login'])) : ?>
                                        <a href="?page=produk-detail&idproduk=<?= $data['id'] ?>&itemdesc=<?= $data['item_desc'] ?>&spesifikasi=<?= $data['spesifikasi'] ?>" class="btn btn-outline-primary"><i class="fas fa-info-circle"></i> Kirim Permohonan</a>
                                    <?php else : ?>
                                        <a href="../login.php" class="btn btn-primary">Kirim Permohonan</a>
                                    <?php endif;
                                    ?>
                                </td>
                            </tr>
                        <?php
                        endwhile ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>