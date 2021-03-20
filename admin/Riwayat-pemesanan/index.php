<div class="container-fluid">
    <h1 class="mt-4">Riwayat-Pemesanan </h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Riwayat-Pemesanan</li>
    </ol>

    <div class="card mb-4">
        <div class="card-body">
            <a href="Riwayat-pemesanan/laporan.php" class="btn btn-primary mb-3 btn-sm"> <i class="fas fa-plus-circle" target="_blank"></i> Laporan Pemesanan</a>
            <div class="table-responsive">
                <table class="table table-bordered dataTable" id="" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Nama Perusahaan</th>
                            <th>Nama Pembeli</th>
                            <th>Pesanan</th>
                            <th>Jumlah</th>
                            <th>Total Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $get = $koneksi->query("SELECT * FROM purchase_order JOIN produk_log ON purchase_order.po_number=produk_log.log_code WHERE `status_log`='SELESAI' GROUP BY log_code") ?>
                        <?php $no = 1;
                        while ($data = $get->fetch_assoc()) : ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $data['date'] ?></td>
                                <td><?= $data['perusahaan_nama'] ?></td>
                                <td><?= $data['buyer'] ?></td>
                                <td><?= $data['item_desc'] ?></td>
                                <td><?= $data['qty'] ?></td>
                                <td><?= number_format($data['total_harga']) ?></td>
                            </tr>
                        <?php $no++;
                        endwhile ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>