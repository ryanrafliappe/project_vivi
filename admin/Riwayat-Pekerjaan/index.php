<div class="container-fluid">
    <h1 class="mt-4">Riwayat-Pekerjaan </h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Riwayat-Pekerjaan</li>
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
            <a href="?page=riwayat-pekerjaan-add" class="btn btn-primary mb-3 btn-sm"> <i class="fas fa-plus-circle"></i> Tambah</a>
            <div class="table-responsive">
                <table class="table table-bordered dataTable" id="" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Lokasi</th>
                            <th>Nama Pekerjaan</th>
                            <th>Nama Client</th>
                            <th>Waktu Pelaksanaan</th>
                            <th>Biaya</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $get = $koneksi->query("SELECT * FROM riwayat_pekerjaan") ?>
                        <?php $no = 1;
                        while ($data = $get->fetch_assoc()) : ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $data['lokasi'] ?></td>
                                <td><?= $data['nama_pekerjaan'] ?></td>
                                <td><?= $data['nama_client'] ?></td>
                                <td><?= $data['waktu_pelaksanaan'] ?></td>
                                <td><?= $data['fee'] ?></td>
                                <td>
                                    <div class="text-center">
                                        <a href="index.php?page=riwayat-pekerjaan-delete&id=<?= $data['id'] ?>">
                                            <button type="button" class="btn btn-danger btn-sm rounded-pill">Hapus</button>
                                        </a>
                                        <a href="index.php?page=riwayat-pekerjaan-edit&id=<?= $data['id'] ?>">
                                            <button type="button" class="btn btn-warning btn-sm rounded-pill">Ubah</button>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php $no++;
                        endwhile ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>