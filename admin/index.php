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
    <title>Admin</title>
    <link href="../assets/css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="../assets/css/customview.css">
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
    <?php date_default_timezone_set("Asia/Makassar") ?>
    <?php include "../conf/koneksi.php" ?>

</head>

<body class="sb-nav-fixed bg-grey">
    <nav class="sb-topnav navbar navbar-expand navbar-blue">
        <a class="navbar-brand" href="index.php">Admin</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button><!-- Navbar Search-->
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

                        <a class="nav-link" href="?page=produk">
                            <div class="sb-nav-link-icon"><i class="fas fa-store"></i></div>
                            Produk
                        </a>
                        <a class="nav-link" href="?page=workshop">
                            <div class="sb-nav-link-icon"><i class="far fa-user-circle"></i></div>
                            Workshop
                        </a>
                        <a class="nav-link" href="?page=profil">
                            <div class="sb-nav-link-icon"><i class="far fa-address-card"></i></div>
                            Profil
                        </a>
                        <a class="nav-link" href="?page=mitra">
                            <div class="sb-nav-link-icon"><i class="far fa-handshake"></i></div>
                            Mitra
                        </a>
                        <a class="nav-link" href="?page=galeri">
                            <div class="sb-nav-link-icon"><i class="far fa-images"></i></div>
                            Galery
                        </a>
                        <a class="nav-link" href="?page=project">
                            <div class="sb-nav-link-icon"><i class="fas fa-tools"></i></div>
                            Project
                        </a>
                        <a class="nav-link" href="?page=user">
                            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                            User
                        </a>
                        <div class="sb-sidenav-menu-heading">Menu</div>
                        <!-- <a class="nav-link" href="?page=penawaran">
                            <div class="sb-nav-link-icon"><i class="far fa-file-alt"></i></div>
                            Penawaran
                        </a> -->

                        <a class="nav-link" href="?page=produk-penawaran">
                            <div class="sb-nav-link-icon"><i class="far fa-file-alt"></i></div>
                            Penawaran Produk
                        </a>
                        <a class="nav-link" href="?page=riwayat-pekerjaan">
                            <div class="sb-nav-link-icon"><i class="fas fa-undo-alt"></i></div>
                            Riwayat Pekerjaan
                        </a>
                        <a class="nav-link" href="?page=riwayat-pemesanan">
                            <div class="sb-nav-link-icon"><i class="fas fa-undo-alt"></i></div>
                            Riwayat Pemesanan
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
                    Admin
                </div>
            </nav>
        </div>

        <div id="layoutSidenav_content">

            <!-- <main> -->
            <?php
            if (isset($_GET['page'])) {
                switch ($_GET['page']) {

                    case 'user':
                        include "User/index.php";
                        break;
                    case 'user-add':
                        include "User/add.php";
                        break;
                    case 'user-delete':
                        include "User/delete.php";
                        break;
                    case 'user-update':
                        include "User/update.php";
                        break;

                    case 'artikel':
                        include "Artikel/index.php";
                        break;
                    case 'artikel-add':
                        include "Artikel/add.php";
                        break;

                    case 'mitra':
                        include "Mitra/index.php";
                        break;
                    case 'mitra-add':
                        include "Mitra/add.php";
                        break;
                    case 'mitra-delete':
                        include "Mitra/delete.php";
                        break;
                    case 'mitra-update':
                        include "Mitra/update.php";
                        break;

                    case 'galeri':
                        include "Galeri/index.php";
                        break;
                    case 'galeri-add':
                        include "Galeri/add.php";
                        break;
                    case 'galeri-delete':
                        include "Galeri/delete.php";
                        break;
                    case 'galeri-update':
                        include "Galeri/update.php";
                        break;

                    case 'produk':
                        include "Produk/index.php";
                        break;
                    case 'produk-add':
                        include "Produk/add.php";
                        break;
                    case 'produk-delete';
                        include "Produk/delete.php";
                        break;
                    case 'produk-update':
                        include "Produk/update.php";
                        break;

                    case 'project':
                        include "Project/index.php";
                        break;
                    case 'project-add':
                        include "Project/add.php";
                        break;
                    case 'project-delete';
                        include "Project/delete.php";
                        break;
                    case 'project-kirim':
                        include "Project/kirim.php";
                        break;
                    case 'project-update';
                        include "Project/update.php";
                        break;

                    case 'produk-penawaran':
                        include "Produk-Penawaran/index.php";
                        break;
                    case 'produk-penawaran-detail':
                        include "Produk-Penawaran/detail.php";
                        break;
                    case 'produk-penawaran-detail-add':
                        include "Produk-Penawaran/add.php";
                        break;
                    case 'produk-penawaran-konfirmasi':
                        include "Produk-Penawaran/konfirmasi-pembayaran.php";
                        break;

                    case 'profil':
                        include "Profil/index.php";
                        break;
                    case 'profil-simpan':
                        include "Profil/save.php";
                        break;

                    case 'workshop':
                        include "Workshop/index.php";
                        break;

                    case 'riwayat-pekerjaan':
                        include "Riwayat-Pekerjaan/index.php";
                        break;

                    case 'riwayat-pekerjaan-add':
                        include "Riwayat-Pekerjaan/add.php";
                        break;

                    case 'riwayat-pekerjaan-delete':
                        include "Riwayat-Pekerjaan/delete.php";
                        break;

                    case 'riwayat-pekerjaan-edit':
                        include "Riwayat-Pekerjaan/edit.php";
                        break;

                    case 'riwayat-pemesanan':
                        include "Riwayat-pemesanan/index.php";
                        break;

                    default:
                        include "Produk-Penawaran/index.php";
                        break;
                }
            } else {
                include "Produk-Penawaran/index.php";
            }

            ?>
            <!-- </main> -->

            <!-- <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2019</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer> -->
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