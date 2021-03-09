<div class="container-fluid">
    <h1 class="mt-4">Galeri </h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Galeri</li>
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
            <a href="?page=galeri-add" class="btn btn-primary mb-3 btn-sm"> <i class="fas fa-plus-circle"></i> Tambah</a>
            <div class="table-responsive">
                <table class="table table-bordered dataTable"  width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Foto</th>
                            <th>Keterangan</th>
                            <th>Kategori</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $get = $koneksi->query("SELECT * FROM galeri") ?>
                        <?php $no = 1;
                        while ($data = $get->fetch_assoc()) : ?>
                            <tr>
                                <td class="align-middle"><?= $no ?></td>
                                <td class="align-middle"><img src="../assets/img/<?= $data['foto'] ?>" class="img-fluid" width="200px"></td>
                                <td class="align-middle"><?= $data['keterangan'] ?></td>
                                <td class="align-middle"><?= $data['kategori'] ?></td>
                                <td class="align-middle"><?= $data['tanggal'] ?></td>
                                <td class="text-center align-middle">
                                    <a href="?page=galeri-delete&id=<?= $data['id'] ?>" class="btn btn-danger btn-sm rounded-pill">Hapus</a>
                                    <a href="?page=galeri-update&id=<?= $data['id'] ?>" class="btn btn-warning btn-sm rounded-pill">Ubah</a>
                                </td>
                            </tr>
                        <?php $no++; endwhile ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>