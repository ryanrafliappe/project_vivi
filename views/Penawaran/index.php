<div class="container mt-5">
    <h3>Form Pengajuan</h3>
    <div class="row">
        <div class="col-lg-12 mt-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="hidden" name="idprojek" value="<?= $_GET['id'] ?>">
                            <input type="hidden" name="iduser" value="<?= $_SESSION['login']['id'] ?>">
                            <label for="">Nama</label>
                            <input type="text" name="nama" value="<?= $_SESSION['login']['nama'] ?>" class="form-control" autocomplete="off" disabled>
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email" value="<?= $_SESSION['login']['email'] ?>" class="form-control" autocomplete="off" disabled>
                        </div>
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <textarea name="alamat" class="form-control" cols="30" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Contact Person</label>
                            <input type="number" name="nohp" id="" class="form-control" autocomplete="off">
                        </div>

                        <div class="form-group text-right">
                            <a href="?page=projek" class="btn"><i class="fas fa-arrow-left"></i> Kembali</a>
                            <button class="btn btn-primary" type="submit" name="ajukan"><i class="fas fa-file-upload"></i> Ajukan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    if (isset($_POST['ajukan'])) {
        $alamat = $_POST['alamat'];
        $nohp = $_POST['nohp'];
        $idproject = $_POST['idprojek'];
        $iduser = $_POST['iduser'];

        $koneksi->query("INSERT INTO `pengajuan_project`(`id_user`, `id_project`, `alamat`, `contact_person`) VALUES ('$iduser','$idproject','$alamat','$nohp') ");

        
    }