<?php

if(!isset($_SESSION['login'])){
    header('location: ../login.php');
}else{
    echo "<a href='?page=projek'></a>";
}

// var_dump($_SESSION);
?>


<div class="container">
    <h1 class="mt-4">Project </h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item ">Project</li>
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

    <!-- tetapkan logcode -->

    <div class="row">
        <div class="col-lg-4">
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <form action="" enctype="multipart/form-data" method="POST">
                        <input type="hidden" name="id_user" value="<?= $_SESSION['login']['id'] ?>" />
                        <div class="text-muted">Nama</div>
                        <div class="h5 mb-4"><?= $_SESSION['login']['nama'] ?></div>
                        <div class="text-muted">E-mail</div>
                        <div class="h5 mb-4"><?= $_SESSION['login']['email'] ?></div>
                        <div class="text-muted mb-2">Upload Surat Permohonan</div>
                        <input type="file" name="file" class="mb-4" />
                        <div class="text-right mt-2">
                            <button type="submit" name="kirim" class="btn btn-primary"> <i class="fas fa-info-circle"></i> Kirim Permohonan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered dataTable" id="" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th width="3%">No</th>
                                    <th>Surat Permohonan</th>
                                    <th>Surat Balasan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $id = $_SESSION['login']['id'];

                                ?>
                                <?php $get = $koneksi->query("SELECT project.id, id_user, nama_surat,surat_balasan, status 
                                FROM project JOIN user ON project.id_user=user.id WHERE id_user='$id'") ?>
                                <?php

                                $no = 1;
                                while ($data = $get->fetch_assoc()) : ?>
                                    <tr>
                                        <td class="align-middle"><?= $no ?></td>
                                        <?php
                                        echo "<td><a href='../assets/dokumen/" . $data['nama_surat'] . "'>" . $data['nama_surat'] . "</a></td>";
                                        ?>
                                        <?php
                                        if ($data['status'] == "Menunggu Konfirmasi") {
                                            echo '<td class="text-center"></td>';
                                            echo "<td class='align-middle' style='color:red;'>" .  $data['status'] . "</td>";
                                            echo '<td class="text-center"></td>';
                                        } else if ($data['status'] == "Terkirim") {
                                            echo "<td class='align-middle'><a href='../assets/dokumen/" . $data['surat_balasan'] . "'>" . $data['surat_balasan'] . " '</a></td>";
                                            echo "<td class='align-middle' style='color:blue;'>" . $data['status'] . "</td>";
                                            echo "<td class='align-middle text-center'>";
                                            echo "<a href='?page=konfirmasi&id=" . $data['id'] . "'><button type='submit' class='btn btn-outline-primary'>Konfirmasi</button>";
                                            echo "</td>";
                                        } else if ($data['status'] == "Terima") {
                                            echo "<td class='align-middle'><a href='../assets/dokumen/" . $data['surat_balasan'] . "'>" . $data['surat_balasan'] . " '</a></td>";
                                            echo "<td class='align-middle' style='color:green;'>" . $data['status'] . "</td>";
                                            echo '<td class="text-center"></td>';
                                        }
                                        ?>
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
</div>

<?php
if (isset($_POST['kirim'])) {
    $id_user = $_POST['id_user'];

    $file = $_FILES['file']['name'];
    $tmpname = $_FILES['file']['tmp_name'];

    $status = "Menunggu Konfirmasi";
    move_uploaded_file("$tmpname", "../assets/dokumen/$file");

   $simpan =  $koneksi->query("INSERT INTO `project`(`id_user`, `nama_surat`, `status`) VALUES
     ('$id_user', '$file', '$status')");

if ($simpan) {
    
    $_SESSION['flashmessage']['pesan'] = 'Data berhasil ditambahkan.';
    $_SESSION['flashmessage']['warna'] = 'alert-success';

} else {
    echo $koneksi->error;
}

    echo "<script>location='?page=projek&id=$id_user'</script>";
}
