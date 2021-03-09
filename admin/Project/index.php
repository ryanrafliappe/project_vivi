<div class="container-fluid">
    <h1 class="mt-4">Project </h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Project</li>
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
                <table class="table table-bordered dataTable" id="" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Pengirim</th>
                            <th>Nama Surat</th>
                            <th>Surat Balasan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $get = $koneksi->query("SELECT project.id, id_user, nama, nama_surat,surat_balasan, status FROM project JOIN user ON project.id_user=user.id") ?>
                        <?php $no = 1;
                        while ($data = $get->fetch_assoc()) : ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $data['nama'] ?></td>
                                <td class="align-middle"><a href="../assets/dokumen/<?php echo $data['nama_surat'] ?>"><?php echo $data['nama_surat'] ?></a></td>
                                <?php
                                if ($data['surat_balasan']) {
                                    echo "<td><a href='../assets/dokumen/" . $data['surat_balasan'] . "'>" . $data['surat_balasan'] . "</a></td>";
                                } else {
                                    echo "<td></td>";
                                }

                                ?>
                                <?php
                                if ($data['status'] == "Menunggu Konfirmasi") {
                                    echo '<td style="color:red;">' . $data['status'] . '</td>';
                                    echo "<td class='align-middle text-center'>";
                                    echo "<a href='?page=project-kirim&id=" . $data['id'] . "'><button type='submit' class='btn btn-primary'><i class='fas fa-info-circle'></i> Kirim Balasan</button>";
                                    echo "</td>";
                                } else if ($data['status'] == "Terkirim") {
                                    echo '<td style="color:green;">' . $data['status'] . '</td>';
                                    echo '<td class="text-center"></td>';
                                } else if ($data['status'] == "Terima") {
                                    echo '<td style="color:blue;">' . $data['status'] . '</td>';
                                    echo '<td class="text-center"></td>';
                                }
                                ?>
                            </tr>
                        <?php $no++;
                        endwhile ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>