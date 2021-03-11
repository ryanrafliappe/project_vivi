<div class="container">
    <h1 class="mt-4">Riwayat Produk </h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">Produk</li>
        <li class="breadcrumb-item active">Riwayat</li>
    </ol>

    <?php
    $id = $_SESSION['login']['id'];
    ?>

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
                            <th>Produk Log Code</th>
                            <th>Item Description</th>
                            <th>Jenis Surat</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $get = $koneksi->query("SELECT terbilang,log_code,id_user,jenis_surat,status_log,produk_log.id,produk.item_desc,produk_log.harga,spesifikasi,produk_log.nama_surat,produk.id as id_produk FROM `produk_log` JOIN produk ON produk_log.id_produk = produk.id WHERE produk_log.id_user='$id'") ?>
                        <?php
                        while ($data = $get->fetch_assoc()) : ?>
                            <tr>
                                <td class="align-middle"><?= $data['log_code'] ?></td>
                                <td class="align-middle"><?= $data['item_desc'] ?></td>
                                <td class="align-middle text-uppercase font-italic">
                                    <?php

                                    if ($data['jenis_surat'] == 'PO') { ?>
                                        <i class="fas fa-link"></i> <a href="../admin/Produk-Penawaran/po.php?logcode=<?= $data['log_code'] ?>" class="text-dark"><?= $data['jenis_surat'] ?></a>
                                    <?php
                                    } else if ($data['jenis_surat'] == 'SURAT PENAWARAN HARGA') { ?>
                                        <i class="fas fa-link"></i> <a href="../admin/Produk-Penawaran/ph.php?terbilang=<?= $data['terbilang'] ?>&harga=<?= $data['harga'] ?>&id=<?= $data['id'] ?>&logcode=<?= $data['log_code'] ?>" class="text-dark"><?= $data['jenis_surat'] ?></a>
                                    <?php
                                    } else if ($data['jenis_surat'] == 'INVOICE') { ?>
                                        <i class="fas fa-link"></i> <a href="../admin/Produk-Penawaran/invoice.php?id=<?= $data['id'] ?>&terbilangs=<?= $data['terbilang'] ?>&hargas=<?= $data['harga'] ?>&logcode=<?= $data['log_code'] ?>" class="text-dark"><?= $data['jenis_surat'] ?></a>
                                    <?php
                                    } else { ?>
                                        <i class="fas fa-link"></i> <a href="../assets/dokumen/<?= $data['nama_surat'] ?>" class="text-dark"><?= $data['jenis_surat'] ?></a>
                                    <?php
                                    }
                                    ?>
                                </td>
                                <td class="align-middle"><?= $data['status_log'] ?></td>
                                <td class="text-center">
                                    <?php
                                    if ($data['jenis_surat'] == "SURAT PENAWARAN HARGA" && $data['status_log'] == 'Menunggu Purchace Order') : ?>
                                        <a href="?page=produk-po&id-log=<?= $data['id'] ?>&item_desc=<?= $data['item_desc'] ?>&id-produk=<?= $data['id_produk'] ?>&log-code=<?= $data['log_code'] ?>&id-user=<?= $id ?>" class="btn btn-outline-danger">Purchase Order</a>
                                    <?php elseif ($data['jenis_surat'] == "INVOICE" && $data['status_log'] == 'Menunggu Pembayaran') : ?>
                                        <a href="?page=produk-bayar&id-produk=<?= $data['id_produk'] ?>&harga=<?= $data['harga'] ?>&terbilang=<?= $data['terbilang'] ?>&log-code=<?= $data['log_code'] ?>&id-user=<?= $id ?>" class="btn btn-outline-info btn-sm">Kirim</a>
                                    <?php else : ?>
                                        -
                                    <?php endif ?>
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