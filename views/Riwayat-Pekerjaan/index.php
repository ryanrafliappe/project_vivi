<div class="container">
    <h1 class="mt-4">Riwayat Pekerjaan </h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item ">Riwayat Pekerjaan</li>
    </ol>

    <!-- tetapkan logcode -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered dataTable" id="" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th width="3%">No</th>
                                    <th>Lokasi</th>
                                    <th>Nama Pekerjaan</th>
                                    <th>Nama Client</th>
                                    <th>Waktu Pelaksanaan</th>
                                    <th>Fee</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $get = $koneksi->query("SELECT * FROM riwayat_pekerjaan");
                                $no = 1;
                                while ($data = $get->fetch_assoc()) : ?>
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td><?= $data['lokasi'] ?></td>
                                        <td><?= $data['nama_pekerjaan'] ?></td>
                                        <td><?= $data['nama_client'] ?></td>
                                        <td><?= $data['waktu_pelaksanaan'] ?></td>
                                        <td><?= $data['fee'] ?></td>
                                    </tr>
                                    <?php $no = $no + 1; ?>
                                <?php
                                endwhile ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
