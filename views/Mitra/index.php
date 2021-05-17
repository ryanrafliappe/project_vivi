<div class="container mt-5">
    <h3>Mitra</h3>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Mitra</li>
    </ol>
    <div class="row">

        <?php $get =  $koneksi->query("SELECT * FROM mitra") ?>
        <?php while ($data = $get->fetch_assoc()) { ?>

            <div class="col-lg-4 mt-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center font-weight-bolder"><?= $data['nama'] ?></h5>
                        <p class="card-text"><?= $data['profil'] ?></p>

                    </div>
                </div>
            </div>

        <?php } ?>

    </div>
</div>
