<?php
session_start();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Client</title>
    <!-- <link href="../assets/css/styles.css" rel="stylesheet" /> -->
    <link rel="stylesheet" href="../assets/css/customview.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="../assets/css/productview.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    <?php date_default_timezone_set("Asia/Makassar") ?>
    <?php include "../conf/koneksi.php" ?>
</head>

<body class="bg-grey">

    <nav class="navbar navbar-expand-lg navbar-blue shadow">
        <div class="container">
            <a class="navbar-brand font-weight-bolder" href="#">PT Anugrah Teknik Mandiri</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                </ul>

                <ul class="navbar-nav ">
                    <li class="nav-item">
                        <a class="nav-link" href="?page=home">Home </a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="?page=projek">Project</a>
                    </li> -->

                    <li class="nav-item">
                        <a class="nav-link" href="?page=produk">Produk </a>
                    </li>
                    <?php
                    if (isset($_SESSION['login'])) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="?page=projek">Project </a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="../login.php">Project </a>
                        </li>
                    <?php endif ?>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=mitra">Mitra</a>
                    </li>
                    <li class="nav-item">
                        <!-- <a class="nav-link" href="?page=galeri">Galery</a> -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Galeri
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="?page=galeri-produk">Produk</a>
                            <a class="dropdown-item" href="?page=galeri-project">Projek</a>
                        </div>
                    </li>
                    </li>
                    <?php
                    if (isset($_SESSION['login'])) : ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-user fa-fw"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="?page=produk-riwayat">Riwayat</a>
                                <a class="dropdown-item" href="../logout.php">Logout</a>
                            </div>
                        </li>

                    <?php else : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="../login.php">Login <i class="fas fa-sign-in-alt"></i></a>
                        </li>
                    <?php endif ?>
                </ul>
            </div>
        </div>
    </nav>

    <?php
    if (isset($_GET['page'])) {
        switch ($_GET['page']) {
            case 'home':
                include "Home/index.php";
                break;

            case 'about':
                include "About/index.php";
                break;

            case 'galeri-produk':
                include "Galeri/produk.php";
                break;
            case 'galeri-project':
                include "Galeri/project.php";
                break;

            case 'produk':
                include "Produk/index.php";
                break;
            case 'produk-detail':
                include "Produk/detail.php";
                break;
            case 'produk-riwayat':
                include "Produk/riwayat.php";
                break;

            case 'produk-bayar':
                include "Produk/bayar.php";
                break;

            case 'produk-po':
                include "Produk/purchase-order.php";
                break;

            case 'projek':
                include "Project/index.php";
                break;
            case 'konfirmasi':
                include "Project/konfirmasi.php";
                break;
            case 'read':
                include "Project/read.php";
                break;

            case 'penawaran':
                include "Penawaran/index.php";
                break;
            case 'penawaran-riwayat':
                include "Penawaran/riwayat.php";
                break;
            case 'penawaran-detail':
                include "Penawaran/detail.php";
                break;

            case 'mitra':
                include "Mitra/index.php";
                break;

            default:
                # code...
                break;
        }
    } else {
        include "Home/index.php";
    }
    ?>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../assets/js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="../assets/demo/chart-area-demo.js"></script>
    <script src="../assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="../assets/demo/datatables-demo.js"></script>
</body>

</html>