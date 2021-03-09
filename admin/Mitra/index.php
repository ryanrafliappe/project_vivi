<div class="container-fluid">
    <h1 class="mt-4">Mitra </h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Mitra</li>
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
            <a href="?page=mitra-add" class="btn btn-primary mb-3 btn-sm"><i class="fas fa-plus-circle"></i> Tambah</a>
            <div class="table-responsive">
                <table class="table table-bordered dataTable" id="" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Mitra</th>
                            <!-- <th>Profil Singkat</th> -->
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $get = $koneksi->query("SELECT * FROM mitra") ?>
                        <?php $no = 1;
                        while ($data = $get->fetch_assoc()) : ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $data['nama'] ?></td>
                                <!-- <td><?= $data['profil'] ?></td> -->
                                <td class="text-center">
                                    <a href="?page=mitra-delete&id=<?= $data['id'] ?>" class="btn btn-danger btn-sm rounded-pill">Hapus</a>
                                    <a href="?page=mitra-update&id=<?= $data['id'] ?>" class="btn btn-warning btn-sm rounded-pill">Ubah</a>
                                </td>
                            </tr>
                        <?php endwhile ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>