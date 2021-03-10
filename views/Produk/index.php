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

    <div class="card" style="margin-bottom: 32px">
        <div class="card-body">
            <div class="grid-container">
                <?php $get = $koneksi->query("SELECT * FROM produk")?>
                <?php
                while ($data = $get->fetch_assoc()) : {
                    } ?>
                    <div class="card-deck">
                        <div class="card">
                            <img src="../assets/img/gambar-produk/<?= $data['foto'] ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p style="font-size: 12px; margin-bottom: 4px; color: blue">VIVI - <?= $data['id'] ?></p>
                                <h5 class="card-title"><?= $data['item_desc'] ?></h5>
                                <p class="card-text" style="font-size: 14px; margin-bottom: 64px"><?= $data['spesifikasi'] ?></p>
                                <div class="button-product">
                                    <?php
                                        if (isset($_SESSION['login'])) : ?>
                                        <a href="?page=produk-detail&idproduk=<?= $data['id'] ?>&itemdesc=<?= $data['item_desc'] ?>&spesifikasi=<?= $data['spesifikasi'] ?>" class="btn btn-outline-primary"><i class="fas fa-info-circle"></i> Kirim Permohonan</a>
                                        <?php else : ?>
                                            <a href="../login.php" class="btn btn-primary">Kirim Permohonan</a>
                                        <?php endif;
                                        ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile ?>
            </div>
        </div>
    </div>

</div>