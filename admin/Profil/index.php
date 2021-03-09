<div class="container-fluid">
    <h1 class="mt-4">Profil </h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Profil</li>
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

    <?php
    $get = $koneksi->query("SELECT * FROM profil");
    $set = $get->fetch_assoc();

    ?>

    <form action="?page=profil-simpan" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <textarea name="profil" class="ckeditor" cols="30" rows="10"><?= $set['profil'] ?></textarea>
        </div>
        <div class="form-group">
            <button class="btn btn-primary" name="save">Simpan</button>
        </div>
    </form>
</div>