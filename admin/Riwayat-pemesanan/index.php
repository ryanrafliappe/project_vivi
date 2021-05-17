<div class="container-fluid">
    <h1 class="mt-4">Riwayat-Pemesanan </h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Riwayat-Pemesanan</li>
    </ol>

    <div class="card mb-4">
        <div class="card-body">

            <?php
            function tanggal_indonesia($tanggal){
                $bulan = array (
                1 =>   'Januari',
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember'
                );

                $pecahkan = explode('-', $tanggal);

                return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
            }

            error_reporting(0);
            // $filterWaktu = $_POST['filterWaktu'];
            $tgl_awal = $_POST['tgl_awal'];
            $tgl_akhir = $_POST['tgl_akhir'];
            $jabatan = $_POST['jabatan'];
            $nama = $_POST['nama'];
            $TombolFilter = $_POST['status'];

            ?>
            <div class="row">
              <div class="col">
                <a href="Riwayat-pemesanan/laporan.php?tgl_awal=<?= $tgl_awal ?>&tgl_akhir=<?= $tgl_akhir ?>&nama=<?= $nama ?>&jabatan= <?= $jabatan ?>&kondisiTombol= <?= $TombolFilter ?>" class="btn btn-primary mb-3 btn-sm"> <i class="fas fa-plus-circle" target="_blank"></i> Laporan Pemesanan</a>
              </div>

                <form class="" action="" method="post" >

                  <div class="form-group" style="float:left;width:120px">
                    <input type="hidden" name="status" value="1">
                   <div class="input-group date">
                    <div class="input-group-addon">
                           <span class="glyphicon glyphicon-th"></span>
                       </div>
                       <input placeholder="Tanggal Awal" type="text" class="form-control datepicker" name="tgl_awal" autocomplete="off">
                   </div>
                  </div>

                  <div class="form-group" style="padding-left:10px;float:left;width:120px">
                   <div class="input-group date">
                    <div class="input-group-addon">
                           <span class="glyphicon glyphicon-th"></span>
                       </div>
                       <input placeholder="Tanggal Akhir" type="text" class="form-control datepicker" name="tgl_akhir" autocomplete="off">
                   </div>
                  </div>

                  <div class="form-group" style="padding-left:10px;float:left;">
                    <input type="text" class="form-control" name="jabatan" placeholder="Jabatan" size="10" required>
                  </div>

                  <div class="form-group" style="padding-left:10px;float:left;">
                    <input type="text" class="form-control" name="nama" placeholder="Nama" size="18" required>
                  </div>

                  <button type="submit" class="btn btn-primary ml-3" name="filter" >Filter</button>
                </form>
            </div>

            <?php
            if ($TombolFilter > 0) {
              ?>
              <p>Nama : <b><?=$nama?></b> Jabatan : <b><?=$jabatan?></b> , Riwayat Pemesanan dari tanggal : <b><?=tanggal_indonesia($tgl_awal)?></b> hingga tanggal : <b><?=tanggal_indonesia($tgl_akhir)?></b> </p>
              <?php
            }
             ?>

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
                          // $TombolFilter = "ya";
                          $get = $koneksi->query("SELECT purchase_order.date as date_po, produk_log.date as date_log, perusahaan_nama,buyer,item_desc,qty,price,ongkir
                            FROM purchase_order JOIN produk_log ON purchase_order.po_number=produk_log.log_code WHERE `status_log`='SELESAI' AND `jenis_surat`='INVOICE'
                            AND purchase_order.date between '$tgl_awal' and '$tgl_akhir' GROUP BY log_code");
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
    <script type="text/javascript">
     $(function(){
      $(".datepicker").datepicker({
          format: 'yyyy-mm-dd',
          autoclose: true,
          todayHighlight: true,
          orientation: "bottom",
      });
     });

      if ( window.history.replaceState ) {
          window.history.replaceState( null, null, window.location.href );
      }

    </script>
</div>
