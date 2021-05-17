<div class="container mt-5">
    <h3>Galeri Project</h3>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Galeri Project</li>
    </ol>
    <div class="row">

        <?php $get =  $koneksi->query("SELECT * FROM galeri WHERE kategori='project'") ?>
        <?php while ($data = $get->fetch_assoc()) { ?>

            <div class="col-lg-4 mt-4">
                <div class="card" style="width: 18rem;">
                    <img src="../assets/img/<?php echo $data['foto'] ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text"><?php echo $data['keterangan'] ?></p>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
