<div class="container mt-5">
    <h3><a href="?page=projek" class="text-decoration-none btn"><i class="far fa-arrow-alt-circle-left fa-2x"></i></a> Riwayat Project</h3>
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card mt-3 shadow-sm">
                <div class="card-body">
                    <table class="table table-bordered ">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $id = $_SESSION['login']['id'];
                            $get = $koneksi->query("SELECT id_user,judul,pengajuan_project.id,contact_person FROM `pengajuan_project` JOIN project ON pengajuan_project.id_project=project.id WHERE id_user = '$id'") ?>
                            <?php $no = 1;
                            while ($data = $get->fetch_assoc()) : ?>
                                <tr>
                                    <td class="align-middle text-center"><?= $no ?></td>
                                    <td class="align-middle"><?= $data['judul'] ?></td>
                                    <td class="align-middle">
                                        <?php
                                        $getDataPenjuan = $koneksi->query("SELECT * FROM pengajuan_project_log WHERE id_pengajuan='" . $data['id'] . "'");
                                        $dataPengajuan = $getDataPenjuan->fetch_assoc();
                                        if ($dataPengajuan == null) {
                                           echo "Menunggu Penawaran Harga";
                                        }else {
                                            echo $dataPengajuan['status_pengajuan'];
                                        }
                                        ?>
                                    </td>
                                    <td class="align-middle text-center">
                                        <a href="?page=penawaran-detail&id=<?= $data['id'] ?>&cp=<?= $data['contact_person'] ?>&projek=<?= $data['judul'] ?>" class="btn btn-outline-primary"><i class="fas fa-info-circle"></i></a>
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
</div>