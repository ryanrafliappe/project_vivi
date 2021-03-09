<div class="container-fluid">
    <h1 class="mt-4">Penawaran </h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Penawaran</li>
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
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>User</th>
                            <th>Nama Project</th>
                            <th>Contact Person</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $get = $koneksi->query("SELECT pengajuan_project.id, id_project, nama, contact_person, project.judul FROM pengajuan_project JOIN user ON user.id = pengajuan_project.id_user JOIN project ON pengajuan_project.id_project=project.id") ?>
                        <?php $no = 1;
                        while ($data = $get->fetch_assoc()) :
                            $cek = $koneksi->query("SELECT status_pengajuan FROM pengajuan_project_log WHERE id_pengajuan='" . $data['id'] . "'");
                            if (mysqli_num_rows($cek) > 0) :
                                $hasilcek = $cek->fetch_assoc();
                                $status = $hasilcek['status_pengajuan'];
                            else :
                                $status = "Menunggu Penawaran Harga";
                            endif;
                        ?>

                            <tr>
                                <td class="align-middle"><?= $no ?></td>
                                <td class="align-middle"><?= $data['nama'] ?></td>
                                <td class="align-middle"><?= $data['judul'] ?></td>
                                <td class="align-middle"><?= $data['contact_person'] ?></td>
                                <td class="align-middle"><?= $status ?></td>
                                <td class="text-center">
                                    <a href="?page=penawaran-detail&id=<?= $data['id'] ?>&cp=<?= $data['contact_person'] ?>&nm=<?= $data['nama'] ?>&projek=<?= $data['judul'] ?>" class="btn btn-outline-primary"><i class="fas fa-info-circle"></i></a>
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