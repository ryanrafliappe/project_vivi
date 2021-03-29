<div class="container">
    <h1 class="mt-4">Chat </h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">Produk</li>
        <li class="breadcrumb-item">Riwayat</li>
        <li class="breadcrumb-item active">Chat</li>
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

    <div>
        <div class="card-body">
            <div>
                <div class="panel-body" style="margin-bottom: 50px;">
                <?php
                $id = $_SESSION['login']['email']; 
                $get = $koneksi->query("SELECT * FROM `chat` WHERE pengirim='$id' || penerima= '$id' ORDER BY `date` ASC");
                while ($data = $get->fetch_assoc()) : 
                    if ($data['pengirim'] == $id) { ?> 
                        <div class="row msg_container base_sent">
                            <div class="col-md-8 col-xs-8">
                                <div class="messages msg_sent" style="background: #87CEEB">
                                    <p><?= $data['pesan'] ?></p>
                                    <time datetime="2009-11-13T20:00" style="color:#4d5a6b">Saya • <?= $data['date'] ?></time>
                                </div>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="row msg_container base_receive">
                            <div class="col-md-8 col-xs-8">
                                <div class="messages msg_receive">
                                    <p><?= $data['pesan'] ?></p>
                                    <time datetime="2009-11-13T20:00">Admin • <?= $data['date'] ?></time>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <?php endwhile ?>
                </div>
                <div  class="card-body" style="position: fixed;bottom: 0; width: 80%; background: white;">
                    <form action="" method="post">
                        <div class="input-group">
                            <input id="btn-input" type="text" class="form-control input-sm chat_input" name="message" placeholder="Tulis pesan Anda disi..." />
                            <button type="submit" name="send_chat" class="btn btn-primary" id="send_chat"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($_POST['send_chat'])) {
    $pengirim   = $_SESSION['login']['email'];
    $penerima   = "admin";
    $msg        = $_POST['message'];
    $date       = date('Y-m-d H:i:s');

    $datauser = mysqli_num_rows($koneksi->query("SELECT * FROM `user_chat` WHERE `email` = '$pengirim'"));
    
    if ($datauser == 0) {
        $koneksi->query("INSERT INTO `user_chat` (`email`) VALUES ('$pengirim')");
    }

    if ($msg != null) {
        $koneksi->query("INSERT INTO `chat`(`pengirim`, `penerima`, `pesan`, `date`) VALUES ('$pengirim','$penerima','$msg','$date')");
    }

    echo "<script>location='?page=produk-chat'</script>";
} ?>

<script>
    $(document).ready(function() {
        $(document).scrollTop($(document).height());
    });
</script>