<?php


session_start();

if (!isset($_SESSION['login'])) {
    header('Location: ../login.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Workshop</title>
    <link href="../assets/css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="../assets/css/customview.css">
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
    <?php date_default_timezone_set("Asia/Makassar") ?>
    <?php include "../conf/koneksi.php" ?>

</head>

<body class="sb-nav-fixed bg-grey">
    <nav class="sb-topnav navbar navbar-expand navbar-blue">
        <a class="navbar-brand" href="index.php">Workshop</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button><!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <div class="input-group">
                <input type="hidden" />

            </div>
        </form>
        <!-- Navbar -->
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown">
                <input type="hidden" name="">
            </li>
        </ul>
    </nav>

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-grey" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">

                        <div class="sb-sidenav-menu-heading">Data</div>

                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-store"></i></div>
                            Workshop
                        </a>
                        <div class="sb-sidenav-menu-heading">Option</div>
                        <a class="nav-link" href="../logout.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
                            Logout
                        </a>

                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    Workshop
                </div>
            </nav>
        </div>

        <div id="layoutSidenav_content">
            <div class="container-fluid">
                <h1 class="mt-4">Workshop </h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Workshop</li>
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
                                        <th>Nama Barang</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $get = $koneksi->query("SELECT * FROM workshop") ?>
                                    <?php $no = 1;
                                    while ($data = $get->fetch_assoc()) : ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td>
                                            <a href="../assets/img/gambar-workshop/<?= $data['barang'] ?>">
                                                <img src="../assets/img/gambar-workshop/<?= $data['barang'] ?>" class="img-fluid" width="100px" alt="Responsive image" alt="">
                                            </a>
                                            </td>
                                            <td class="align-middle" style="text-align: center;">
                                                <?php if ($data['status'] == 'SELESAI') : ?>
                                                    <span>SELESAI</span>
                                                <?php elseif ($data['status'] == 'Sedang Dikerjakan') : ?>
                                                    <span>Sedang Dikerjakan</span>
                                                <?php endif ?>
                                            </td>
                                            <td class="align-middle" style="text-align: center;">

                                                <?php if ($data['status'] == 'SELESAI') : ?>
                                                    -
                                                <?php elseif ($data['status'] == 'Sedang Dikerjakan') : ?>
                                                    <a href="konfirmasi.php?id=<?= $data['id'] ?>">
                                                        <button type="submit" class="btn btn-primary btn-sm rounded-pill">Konfirmasi</button>
                                                    </a>
                                                <?php endif ?>

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
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../assets/js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="../assets/demo/chart-area-demo.js"></script>
    <script src="../assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="../assets/demo/datatables-demo.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/22.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('.ckeditor'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
</body>

</html>