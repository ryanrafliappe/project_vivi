<div class="container-fluid">
    <h1 class="mt-4">Riwayat-Pemesanan </h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Riwayat-Pemesanan</li>
    </ol>

    <div class="card mb-4">
        <div class="card-body">

            <?php
            error_reporting(0);
            $filterWaktu = $_POST['filterWaktu'];
            $jabatan = $_POST['jabatan'];
            $nama = $_POST['nama'];
            ?>
            <div class="row">
              <div class="col">
                <a href="Riwayat-pemesanan/laporan.php?filter=<?= $filterWaktu ?>&nama=<?= $nama ?>&jabatan= <?= $jabatan ?>" class="btn btn-primary mb-3 btn-sm"> <i class="fas fa-plus-circle" target="_blank"></i> Laporan Pemesanan</a>
              </div>
              <div class="col">
                <form class="" action="" method="post" style="float:right">
                  <div class="form-group" style="float:left; margin-right:12px">
                    <input type="text" name="jabatan" placeholder="Jabatan" size="10" required>
                    <input type="text" name="nama" placeholder="Nama" size="18" required>
                  </div>
                  <div class="form-group" style="float:left; margin-right:20px;">
                      <select name="filterWaktu" id="" class="custom-select">
                         <option value="1minggu" selected>Pilih waktu</option>
                          <option value="1minggu" >1 Minggu</option>
                          <option value="1bulan" >1 Bulan</option>
                          <option value="3bulan" >3 Bulan</option>
                          <option value="1tahun" >1 Tahun</option>
                      </select>
                  </div>
                  <button type="submit" class="btn btn-primary" name="filter" >Filter</button>
                </form>
              </div>
            </div>
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
                            <th>Harga Satuan</th>
                            <th>Harga Ongkir</th>
                            <th>Total Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $get = $koneksi->query("SELECT purchase_order.date as date_po, produk_log.date as date_log, perusahaan_nama,buyer,item_desc,qty,price,ongkir
                          FROM purchase_order JOIN produk_log ON purchase_order.po_number=produk_log.log_code WHERE `status_log`='SELESAI' AND `jenis_surat`='INVOICE'
                          GROUP BY log_code");

                        if (isset($_POST['filter'])) {

                          $minggu1 = date("Y-m-d", strtotime("-1 week"));
                          $bulan1 = date("Y-m-d", strtotime("-1 month"));
                          $bulan3 = date("Y-m-d", strtotime("-3 months"));
                          $tahun1 = date("Y-m-d", strtotime("-1 year"));
                          $now = date("Y-m-d");

                          if ($filterWaktu == '1minggu') {
                            $get = $koneksi->query("SELECT purchase_order.date as date_po, produk_log.date as date_log, perusahaan_nama,buyer,item_desc,qty,price,ongkir
                              FROM purchase_order JOIN produk_log ON purchase_order.po_number=produk_log.log_code WHERE `status_log`='SELESAI' AND `jenis_surat`='INVOICE'
                              AND purchase_order.date between '$minggu1' and '$now' GROUP BY log_code");
                          } elseif ($filterWaktu == '1bulan') {
                            $get = $koneksi->query("SELECT purchase_order.date as date_po, produk_log.date as date_log, perusahaan_nama,buyer,item_desc,qty,price,ongkir
                              FROM purchase_order JOIN produk_log ON purchase_order.po_number=produk_log.log_code WHERE `status_log`='SELESAI' AND `jenis_surat`='INVOICE'
                              AND purchase_order.date between '$bulan1' and '$now' GROUP BY log_code");
                          } elseif ($filterWaktu == "3bulan") {
                            $get = $koneksi->query("SELECT purchase_order.date as date_po, produk_log.date as date_log, perusahaan_nama,buyer,item_desc,qty,price,ongkir
                              FROM purchase_order JOIN produk_log ON purchase_order.po_number=produk_log.log_code WHERE `status_log`='SELESAI' AND `jenis_surat`='INVOICE'
                              AND purchase_order.date between '$bulan3' and '$now' GROUP BY log_code");
                          } elseif ($filterWaktu == '1tahun') {
                            $get = $koneksi->query("SELECT purchase_order.date as date_po, produk_log.date as date_log, perusahaan_nama,buyer,item_desc,qty,price,ongkir
                              FROM purchase_order JOIN produk_log ON purchase_order.po_number=produk_log.log_code WHERE `status_log`='SELESAI' AND `jenis_surat`='INVOICE'
                              AND purchase_order.date between '$tahun1' and '$now' GROUP BY log_code");
                          }


                        }

                         $no = 1;

                        while ($data = $get->fetch_assoc()) :
                          $hargappn = $data['price'] + ($data['price'] * 0.1);
                          $totalharga = ($hargappn * $data['qty']) + $data['ongkir'];  ?>

                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $data['date_log'] ?></td>
                                <td><?= $data['perusahaan_nama'] ?></td>
                                <td><?= $data['buyer'] ?></td>
                                <td><?= $data['item_desc'] ?></td>
                                <td><?= $data['qty'] ?></td>
                                <td><?= number_format($hargappn) ?></td>
                                <td><?= number_format($data['ongkir']) ?></td>
                                <td><?= number_format($totalharga) ?></td>
                            </tr>
                        <?php $no++;
                      endwhile;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
