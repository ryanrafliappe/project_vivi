<div class="container">
    <h1 class="mt-4">Produk </h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Produk</li>
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

    <div class="card" style="margin-bottom: 32px">
        <div class="card-body">
            <div class="grid-container">
                <?php $get = $koneksi->query("SELECT * FROM produk")?>
                <?php
                $i = -1;
                foreach ($get as $key => $value) {
                    $i++;?>
                    <div class="card-deck">
                        <div class="card">

                            <?php
                            if ($value['fotob'] == '-' && $value['fotoc'] == '-' && $value['fotod'] == '-') { ?>
                                <img src="../assets/img/gambar-produk/<?= $value['foto'] ?>" class="card-img-top" alt="...">
                            <?php } else { ?>
                                <div id="carouselExampleControls<?php echo($i) ?>" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner active">
                                        <div class="carousel-item active">
                                            <img src="../assets/img/gambar-produk/<?= $value['foto'] ?>" class="d-block w-100 card-img-top">
                                        </div>
                                        <?php if ($value['fotob'] != '-') { ?>
                                            <div class="carousel-item">
                                                <img src="../assets/img/gambar-produk/<?= $value['fotob'] ?>" class="d-block w-100 card-img-top">
                                            </div>
                                        <?php } ?>
                                        <?php if ($value['fotoc'] != '-') { ?>
                                            <div class="carousel-item">
                                                <img src="../assets/img/gambar-produk/<?= $value['fotoc'] ?>" class="d-block w-100 card-img-top">
                                            </div>
                                        <?php } ?>
                                        <?php if($value['fotod'] != '-') { ?>
                                            <div class="carousel-item">
                                                <img src="../assets/img/gambar-produk/<?= $value['fotod'] ?>" class="d-block w-100 card-img-top">
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleControls<?php echo($i) ?>" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleControls<?php echo($i) ?>" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            <?php } ?>

                            <div class="card-body">
                                <p style="font-size: 12px; margin-bottom: 4px; color: blue">VIVI - <?= $value['id'] ?></p>
                                <h5 class="card-title"><?= $value['item_desc'] ?></h5>
                                <p class="card-text" style="font-size: 14px; margin-bottom: 64px"><?= $value['spesifikasi'] ?></p>
                                <div class="button-product">
                                    <?php
                                    if (isset($_SESSION['login'])) : ?>
                                        <a href="?page=produk-detail&idproduk=<?= $value['id'] ?>&itemdesc=<?= $value['item_desc'] ?>&spesifikasi=<?= $value['spesifikasi'] ?>" class="btn btn-outline-primary"><i class="fas fa-info-circle"></i> Kirim Permohonan</a>
                                    <?php else : ?>
                                        <a href="../login.php" class="btn btn-primary">Kirim Permohonan</a>
                                    <?php endif;?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>