<div class="container-fluid">
    <h1 class="mt-4">Penawaran Produk </h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Penawaran Produk</li>
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
            <div class="table-responsive">
                <table class="table table-bordered dataTable" id="" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Produk Log Code</th>
                            <th>Item Description</th>
                            <th>Jenis Surat</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $get = $koneksi->query("SELECT * FROM `produk_log` GROUP BY log_code ") ?>
                        <?php
                        while ($data = $get->fetch_assoc()) :
                            $idproduk = $data['id_produk'];
                            $log = $data['log_code']; ?>
                            <tr>
                                <td class="align-middle"><?= $data['log_code'] ?></td>

                                <td class="align-middle">
                                    <?php $getsss = $koneksi->query("SELECT * FROM `produk` where id = '$idproduk' ") ?>
                                    <?php $dataanya = $getsss->fetch_assoc();
                                    $namaitem = $dataanya['item_desc'];
                                    echo $namaitem;
                                    ?>
                                </td>
                                <td class="align-middle">
                                    <?php
                                    $ambil = $koneksi->query("SELECT * FROM `produk_log` WHERE log_code = '$log' ORDER BY id desc");
                                    $oke = $ambil->fetch_assoc();
                                    $jenis = $oke['jenis_surat'];
                                    echo $jenis;
                                    ?>
                                </td>
                                <td class="align-middle">
                                    <?= $data['status_log'] ?>

                                </td>
                                <td class="text-center">
                                    <a href="?page=produk-penawaran-detail&logcode=<?= $data['log_code'] ?>&itemdesc=<?= $dataanya['item_desc'] ?>" class="btn btn-outline-primary"><i class="fas fa-info-circle"></i></a>
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