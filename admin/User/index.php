<div class="container-fluid">
    <h1 class="mt-4">User </h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">User</li>
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
            <!-- <a href="?page=produk-add" class="btn btn-primary mb-3 btn-sm"> <i class="fas fa-plus-circle"></i> Tambah</a> -->
            <div class="table-responsive">
                <table class="table table-bordered dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $get = $koneksi->query("SELECT * FROM user") ?>
                        <?php $no = 1;
                        while ($data = $get->fetch_assoc()) : ?>
                            <tr>
                                <td><?php echo $no ?></td>
                                <td><?= $data['nama'] ?></td>
                                <td><?= $data['email'] ?></td>

                               
                            </tr>
                            <?php $no = $no + 1; ?>
                        <?php endwhile ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>