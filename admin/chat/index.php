<div class="container-fluid">
    <h1 class="mt-4">Chat </h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Chat</li>
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
                            <th>Nama</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $get = $koneksi->query("SELECT user.nama as nama, user_chat.email FROM `user_chat` JOIN `user` ON user_chat.email = user.email") ?>
                        <?php
                        while ($data = $get->fetch_assoc()) : ?>
                            <tr>
                                <td class="align-middle"><?= $data['nama'] ?></td>
                                </td>
                                <td class="text-center">
                                    <a href="?page=chat-chat&id=<?= $data['email'] ?>" class="btn btn-outline-primary"><i class="fas fa-info-circle"></i></a>
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