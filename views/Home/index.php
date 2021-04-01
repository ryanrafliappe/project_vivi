<div class="container mt-5" style="background-image: url('../assets/img/intro-bg.jpg');background-repeat: no-repeat;background-size: cover; background-position: center;">
    <div class="row justify-content-center">
<h4 style="color:red">Panduan pemesanan produk dapat dilihat pada file <a href="panduan.pdf">ini</a></h3>
        <div class="col-lg-6 mt-5 ">

            <h1 class="display-4 text-center">Selamat Datang!</h1>

        </div>

        <div class="media">
            <div class="media-body">
                <?php
                $get = $koneksi->query("SELECT * FROM profil");
                $set = $get->fetch_assoc();
                echo $set['profil'];
                ?>
            </div>
        </div>
        <!-- <a class="btn btn-primary btn-lg mb-5" href="?page=produk" role="button">Lihat Produk</a> -->


    </div>
</div>
