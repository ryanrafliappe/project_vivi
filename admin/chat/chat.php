<div class="container-fluid" style="background:#E9ECEF; height:100%">

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
                    $id  = $_GET['id'];
                    $get = $koneksi->query("SELECT * FROM `chat` JOIN `user` ON chat.pengirim = user.email OR chat.penerima = user.email WHERE pengirim='$id' || penerima= '$id' ORDER BY `date` ASC"); ?>
                    <?php while ($data = $get->fetch_assoc()) :
                        if ($data['pengirim'] == 'admin') { ?>
                            <div class="row msg_container base_sent">
                                <div class="col-md-8 col-xs-8">
                                    <div class="messages msg_sent"  style="background: #87CEEB">
                                        <p><?= $data['pesan'] ?></p>
                                        <time datetime="2009-11-13T20:00" style="color:#4d5a6b">Admin • <?= $data['date'] ?></time>
                                    </div>
                                </div>
                            </div>
                        <?php } else if ($data['pengirim'] == $id) { ?>
                            <div class="row msg_container base_receive">
                                <div class="col-md-8 col-xs-8">
                                    <div class="messages msg_receive">
                                        <p><?= $data['pesan'] ?></p>
                                        <time datetime="2009-11-13T20:00"><?= $data['nama'] ?> • <?= $data['date'] ?></time>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    <?php endwhile ?>
                </div>
                <div class="card-body" style="position: fixed;bottom: 0; width: 83%; background: white;">
                    <form action="" method="post">
                        <div class="input-group">
                            <input id="btn-input" type="text" class="form-control input-sm chat_input" name="message" placeholder="Balas..." />
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
    $pengirim   = 'admin';
    $penerima   = $_GET['id'];
    $msg        = $_POST['message'];
    $date       = date('Y-m-d H:i:s');

    $koneksi->query("INSERT INTO `chat`(`pengirim`, `penerima`, `pesan`, `date`) VALUES ('$pengirim','$penerima','$msg','$date')");

    echo "<script>location='?page=chat-chat&id=$penerima'</script>";
}
?>

<script>
    $(document).ready(function() {
        $(document).scrollTop($(document).height());
    });
</script>
