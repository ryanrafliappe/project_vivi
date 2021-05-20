<div class="container mt-5">
    <h3 style="text-align:center">Ganti Password</h3>
    <!-- <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Ganti Password</li>
    </ol> -->
    <?php
    $id = $_SESSION['login']['id'];
    $email = $_SESSION['login']['email'];
    ?>
    <div class="d-flex justify-content-center">

        <?php $get =  $koneksi->query("SELECT * FROM user WHERE id = '$id'") ?>
        <?php while ($data = $get->fetch_assoc()) { ?>



            <div class="col-lg-4 mt-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center font-weight-bolder">Hay, <?= $data['nama'] ?></h5>
                        <form class="" action="" method="post">
                          <div class="form-group">
                              <label for="">Password Lama</label>
                              <input type="text" name="katasandi_lama" class="form-control"  required>
                          </div>
                          <div class="form-group">
                              <label for="">Password Baru</label>
                              <input type="text" name="katasandi_baru" class="form-control" required>
                          </div>
                          <div class="form-group">
                              <label for="">Konfirmasi Password Baru</label>
                              <input type="text" name="konfirmasi_katasandi_baru" class="form-control" required>
                          </div>

                          <div class="form-group text-right">

                              <button type="submit" name="ubah" class="btn btn-info"> <i class="fas fa-pen"></i> Ubah</button>
                          </div>
                        </form>
                    <?php
                    if (isset($_POST['ubah'])) {
                        // $id = $_POST['id'];
                        $password_lama = $_POST['katasandi_lama'];
                        $password_baru = $_POST['katasandi_baru'];
                        $konfirmasi_password_baru = $_POST['konfirmasi_katasandi_baru'];

                        if ($password_lama != $data['katasandi']) {
                          ?>
                          <div class="alert alert-danger" role="alert">
                            Password lama yang dimasukkan salah
                          </div>
                          <?php
                        }else if ($konfirmasi_password_baru != $password_baru) {
                          ?>
                          <div class="alert alert-danger" role="alert">
                            Password baru dan password konfirmasi berbeda
                          </div>
                          <?php
                        } else {
                          $koneksi->query("UPDATE user SET `katasandi`='$password_baru' WHERE id=$id");
                              ?>
                              <div class="alert alert-success" role="alert">
                                Data Berhasil diubah
                              </div>
                            <?php


                        }



                    }
                     ?>
                    </div>
                </div>

            </div>

        <?php } ?>

    </div>
    <script type="text/javascript">
      if ( window.history.replaceState ) {
      window.history.replaceState( null, null, window.location.href );
      }
    </script>
</div>
