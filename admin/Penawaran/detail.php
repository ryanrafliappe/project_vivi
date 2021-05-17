<div class="container-fluid">
    <h1 class="mt-4">Detail Penawaran </h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item "><a href="?page=produk-penawaran">Penawaran Produk</a></li>
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
    $cek = $koneksi->query("SELECT status_pengajuan FROM pengajuan_project_log WHERE id_pengajuan='" . $_GET['id'] . "'");
    if (mysqli_num_rows($cek) > 0) :
        $hasilcek = $cek->fetch_assoc();
        $status = $hasilcek['status_pengajuan'];
    else :
        $status = "Menunggu Penawaran Harga";
    endif;
    ?>

    <div class="row">
        <div class="col-lg-4">
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <div class="text-muted">Nama Project</div>
                    <div class="h5 mb-4"><?= strtoupper($_GET['projek']) ?></div>
                    <div class="text-muted">Nama User</div>
                    <div class="h5 mb-4"><?= strtoupper($_GET['nm']) ?></div>
                    <div class="text-muted">Contact Person</div>
                    <div class="h5 mb-4"><?= $_GET['cp'] ?></div>
                    <div class="text-muted">Status</div>
                    <div class="h5 mb-4"><?= $status ?></div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary mb-4 btn-sm" data-toggle="modal" data-target="#staticBackdrop">
                        <i class="fas fa-plus-circle"></i> Tambah
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="?page=penawaran-detail-add" method="post" enctype="multipart/form-data">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Tambah Surat</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <input type="hidden" name="idpengajuan" value="<?= $_GET['id'] ?>">
                                            <input type="file" class="form-control-file" name="nama" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Jenis Surat</label>
                                            <select name="jenisSurat" id="" class="custom-select">
                                                <option value="PENAWARAN HARGA" selected>PENAWARAN HARGA</option>
                                                <option value="INVOICE">INVOICE</option>

                                            </select>
                                        </div>
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
                                <?php $get = $koneksi->query("SELECT * FROM pengajuan_project_log WHERE id_pengajuan = '".$_GET['id']."'") ?>
                                <?php
                                while ($data = $get->fetch_assoc()) : ?>
                                    <tr>
                                        <td class="align-middle"><?= $data['jenis_surat'] ?></td>
                                        <td class="text-center">
                                            <a href="../assets/dokumen/<?= $data['nama_surat'] ?>" class="btn btn-outline-primary"><i class="fas fa-info-circle"></i></a>
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
    </div>
</div>
