<div class="container-fluid">
    <h1 class="mt-4">Detail Penawaran </h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item ">Penawaran</li>
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

    <!-- cek status pengajuan -->
    <?php
    $cek = $koneksi->query("SELECT * FROM `produk_log` WHERE log_code='" . $_GET['logcode'] . "' ORDER BY id DESC LIMIT 1");
    $ambil = $koneksi->query("SELECT * FROM `purchase_order` WHERE po_number='" . $_GET['logcode'] . "' ORDER BY id DESC LIMIT 1");
    $hasilcek = $cek->fetch_assoc();
    $cekquantity = $ambil->fetch_assoc();

    $id_user = $hasilcek['id_user'];
    $id_produk = $hasilcek['id_produk'];
    $log_code = $_GET['logcode'];
    $nama_perusahaan = $hasilcek['nama_perusahaan'];
    $alamat_perusahaan = $hasilcek['alamat_perusahaan'];
    $kota = $hasilcek['kota'];
    $harga = $hasilcek['harga'];
    $terbilang = $hasilcek['terbilang'];
    $status = $hasilcek['status_log'];
    $quantity = $cekquantity['qty'];

    ?>

    <!-- get harga asli barang -->
    <?php
    function penyebut($nilai) {
        $nilai = abs($nilai);
        $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
        $temp = "";
        if ($nilai < 12) {
            $temp = " ". $huruf[$nilai];
        } else if ($nilai <20) {
            $temp = penyebut($nilai - 10). " belas";
        } else if ($nilai < 100) {
            $temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
        } else if ($nilai < 200) {
            $temp = " seratus" . penyebut($nilai - 100);
        } else if ($nilai < 1000) {
            $temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
        } else if ($nilai < 2000) {
            $temp = " seribu" . penyebut($nilai - 1000);
        } else if ($nilai < 1000000) {
            $temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
        } else if ($nilai < 1000000000) {
            $temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
        } else if ($nilai < 1000000000000) {
            $temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
        } else if ($nilai < 1000000000000000) {
            $temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
        }
        return $temp;
    }

    function terbilang($nilai) {
        if($nilai<0) {
            $hasil = "minus ". trim(penyebut($nilai));
        } else {
            $hasil = trim(penyebut($nilai));
        }
        return $hasil;
    }

    $cekharga = $koneksi->query("SELECT harga FROM `produk` WHERE id = $id_produk");
    $hasilcekharga = $cekharga->fetch_assoc();

    $hargaasli = $hasilcekharga['harga'];
    $hargappn = $hargaasli + ($hargaasli * 0.1);
    $hargaaslii = number_format($hargappn, 0, ',', '.');
    $hargaterbilang = terbilang($hargappn) . " rupiah";
    ?>

    <div class="row">
        <div class="col-lg-4">
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <div class="text-muted">Produk Log Code</div>
                    <div class="h5 mb-4"><?= strtoupper($_GET['logcode']) ?></div>
                    <div class="text-muted">Item Desc</div>
                    <div class="h5 mb-4"><?= strtoupper($_GET['itemdesc']) ?></div>
                    <div class="text-muted">Status</div>
                    <div class="h5 mb-4 d-flex justify-content-between">
                        <?= $status ?>
                        <?php if ($status == "Menunggu Konfirmasi") : ?>
                            <a href="?page=produk-penawaran-konfirmasi&logcode=<?= $log_code ?>&itemdesc=<?= $_GET['itemdesc'] ?>" class="btn btn-primary btn-sm"><i class="fas fa-check"></i> Konfirmasi</a>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <!-- Button trigger modal -->
                    <?php if ($status == "Menunggu Pembayaran" || $status == "SELESAI" || $status == "Menunggu Konfirmasi") : ?>
                    <?php else : ?>
                        <?php if ($status == "Menunggu Surat Penawaran Harga") { ?>
                            <button type="button" class="btn btn-primary mb-4 btn-sm" data-toggle="modal" data-target="#staticBackdrop">
                                <i class="fas fa-plus-circle"></i> Surat Penawaran
                            </button>
                        <?php } else if ($status == "Menunggu Invoice") { ?>
                            <button type="button" class="btn btn-primary mb-4 btn-sm" data-toggle="modal" data-target="#staticBackdropInvoice">
                            <i class="fas fa-plus-circle"></i> Invoice
                        </button>
                        <?php } ?>
                    <?php endif ?>

                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- form -->
                                <form action="?page=produk-penawaran-detail-add" method="post" enctype="multipart/form-data">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Tambah Surat</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <input type="hidden" name="id_user" value="<?= $id_user ?>">
                                            <input type="hidden" name="id_produk" value="<?= $id_produk ?>">
                                            <input type="hidden" name="log_code" value="<?= $log_code ?>">
                                            <input type="hidden" name="nama_perusahaan" value="<?= $nama_perusahaan ?>">
                                            <input type="hidden" name="alamat_perusahaan" value="<?= $alamat_perusahaan ?>">
                                            <input type="hidden" name="harga" value="<?= $harga ?>">
                                            <input type="hidden" name="kota" value="<?= $kota ?>">
                                        </div>
                                        <?php if ($hasilcek['status_log'] == 'Menunggu Surat Penawaran Harga') : ?>
                                            <div class="form-group">
                                                <label for="">Harga Satuan</label>
                                                <input type="text" class="form-control" value="Rp <?= number_format($hargaasli, 0, ',', '.'); ?>" readonly>
                                                <input type="hidden" name="hargas" value="<?= $hargaasli ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Harga + PPN</label>
                                                <input type="text" class="form-control" value="Rp <?= $hargaaslii ?>" readonly>
                                                <input type="hidden" name="" value="<?= $hargaaslii ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Terbilang</label>
                                                <input type="text" name="terbilangs" class="form-control" value="<?= $hargaterbilang ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Jenis Surat</label>
                                                <select name="jenisSurat" id="" class="custom-select">
                                                    <option value="SURAT PENAWARAN HARGA" selected>PENAWARAN HARGA</option>
                                                </select>
                                            </div>
                                        <?php endif ?>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn " data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" name="tambah">Tambah</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="staticBackdropInvoice" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- form -->
                                <form action="?page=produk-penawaran-detail-add" method="post" enctype="multipart/form-data">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Tambah Surat</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <input type="hidden" name="id_user" value="<?= $id_user ?>">
                                            <input type="hidden" name="id_produk" value="<?= $id_produk ?>">
                                            <input type="hidden" name="log_code" value="<?= $log_code ?>">
                                            <input type="hidden" name="nama_perusahaan" value="<?= $nama_perusahaan ?>">
                                            <input type="hidden" name="alamat_perusahaan" value="<?= $alamat_perusahaan ?>">
                                            <input type="hidden" name="harga" value="<?= $harga ?>">
                                            <input type="hidden" name="kota" value="<?= $kota ?>">

                                        </div>
                                        <?php if ($hasilcek['status_log'] == 'Menunggu Invoice') : ?>
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Harga Total</label>
                                                    <input type="text" value="<?= 'Rp ' . number_format(($harga + ($harga * 0.1) * $quantity), 0, ',', '.') ?>" readonly class="form-control" id="exampleInputPassword1">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Terbilang</label>
                                                    <input type="text" name="terbilang" class="form-control" id="exampleInputPassword1" value="<?= terbilang($harga + ($harga * 0.1)) . ' rupiah' ?>" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Ongkos Kirim</label>
                                                    <input type="text" name="ongkir" class="form-control" id="ex">
                                                </div>
                                                <label for="">Jenis Surat</label>
                                                <select name="jenisSurat" id="" class="custom-select">
                                                    <option value="INVOICE">INVOICE</option>
                                                </select>
                                            </div>
                                        <?php endif ?>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn " data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" name="tambah">Tambah</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Jenis Surat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $get = $koneksi->query("SELECT * FROM produk_log WHERE log_code = '" . $_GET['logcode'] . "'") ?>
                                <?php
                                while ($data = $get->fetch_assoc()) :
                                    if ($data['jenis_surat'] == 'PO') : ?>
                                        <tr>
                                            <td class="align-middle text-uppercase"><?= $data['jenis_surat'] ?></td>
                                            <td class="text-center">
                                                <a href="Produk-Penawaran/po.php?logcode=<?= $data['log_code'] ?>" class="btn btn-outline-primary" target="_blank"><i class="fas fa-info-circle"></i></a>
                                            </td>
                                        </tr>
                                    <?php elseif ($data['jenis_surat'] == 'SURAT PENAWARAN HARGA') : ?>
                                        <tr>
                                            <td class="align-middle text-uppercase"><?= $data['jenis_surat'] ?></td>
                                            <td class="text-center">
                                                <a href="Produk-Penawaran/pH.php?id=<?= $data['id'] ?>&terbilang=<?= $data['terbilang'] ?>&harga=<?= $data['harga'] ?>&logcode=<?= $data['log_code'] ?>" class="btn btn-outline-primary" target="_blank"><i class="fas fa-info-circle"></i></a>
                                            </td>
                                        </tr>
                                    <?php elseif ($data['jenis_surat'] == 'INVOICE') : ?>
                                        <tr>
                                            <td class="align-middle text-uppercase"><?= $data['jenis_surat'] ?></td>
                                            <td class="text-center">
                                                <a href="Produk-Penawaran/invoice.php?id=<?= $data['id'] ?>&terbilangs=<?= $data['terbilang'] ?>&hargas=<?= $data['harga'] ?>&logcode=<?= $data['log_code'] ?>&ongkir=<?= $data['ongkir'] ?>" class="btn btn-outline-primary" target="_blank"><i class="fas fa-info-circle"></i></a>
                                            </td>
                                        </tr>
                                    <?php else : ?>
                                        <tr>
                                            <td class="align-middle text-uppercase"><?= $data['jenis_surat'] ?></td>
                                            <td class="text-center">
                                                <a href="../assets/dokumen/<?= $data['nama_surat'] ?>" class="btn btn-outline-primary" target="_blank"><i class="fas fa-info-circle"></i></a>
                                            </td>
                                        </tr>
                                <?php endif;

                                endwhile ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
