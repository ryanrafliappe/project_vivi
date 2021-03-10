<div class="container-fluid">
    <h1 class="mt-4">Produk </h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Produk</li>
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
            <a href="?page=produk-add" class="btn btn-primary mb-3 btn-sm"> <i class="fas fa-plus-circle"></i> Tambah</a>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Item Number</th>
                            <th>Item Description</th>
                            <th>Spesifikasi</th>
                            <th>Harga Satuan</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $get = $koneksi->query("SELECT * FROM produk") ?>
                        <?php $no = 1;

                        while ($data = $get->fetch_assoc()) :
                        $harga = $data['harga'];
                        $resultharga = number_format($harga, 0, ',', '.'); ?>
                            <tr>
                                <td><?php echo $no ?></td>
                                <td>VIVI - <?= $data['id'] ?></td>
                                <td width="20%"><?= $data['item_desc'] ?></td>
                                <td width="20%"><?= $data['spesifikasi'] ?></td>
                                <td width="15%">Rp <?= $resultharga ?></td>
                                <td><img src="../assets/img/gambar-produk/<?= $data['foto'] ?>" alt="" class="img-fluid" width="300px"></td>
                                <td class="text-center">
                                    <a href="?page=produk-delete&id=<?= $data['id'] ?>" class="btn btn-danger btn-sm rounded-pill">Hapus</a>
                                    <a href="?page=produk-update&id=<?= $data['id'] ?>" class="btn btn-warning btn-sm rounded-pill">Ubah</a>
                                    <!-- <a href="?page=produk-update&id=<?= $data['id'] ?>" class="btn btn-success btn-sm rounded-pill">Detail</a> -->
                                </td>
                            </tr>
                            <?php $no = $no + 1; ?>
                        <?php endwhile ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>