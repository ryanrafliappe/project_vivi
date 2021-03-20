<?php

if (!isset($_GET['id'])) {
}

$id = $_GET['id'];

$sql = "SELECT * FROM produk WHERE id=$id";
$query = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_assoc($query);
$spesifikasi = strtr($data['spesifikasi'], array('<br />' => "\n"));

?>

<div class="container-fluid">
    <h1 class="mt-4">Ubah Produk </h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="?page=produk">Produk</a></li>
        <li class="breadcrumb-item active">Ubah Produk</li>
    </ol>

    <form action="" method="post" enctype="multipart/form-data" class="mt-4">
        <input type="hidden" name="id" class="custom-control" value="<?php echo $data['id'] ?>">
        <table>
            <tr>
                <td>
                    <?php if ($data['foto'] != '-') { ?>
                        <img src="../assets/img/gambar-produk/<?php echo $data['foto'] ?>" style="width: 100px;height: 65px;object-fit: cover; margin-right: 16px;">
                    <?php } ?>
                </td>
                <td>
                    <div class="form-group">
                        <label for="">Upload Foto 1</label>
                        <input type="file" name="fotoa" class="custom-control" value="<?php echo $data['foto'] ?>">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <?php if ($data['fotob'] != '-') { ?>
                        <img id="fotob" src="../assets/img/gambar-produk/<?php echo $data['fotob'] ?>" style="width: 100px;height: 65px;object-fit: cover; margin-right: 16px;">
                    <?php } else { ?>
                        <img id="fotob" src="../assets/img/nophoto.png" style="width: 100px;height: 65px;object-fit: cover; margin-right: 16px;">
                    <?php } ?>
                </td>
                <td>
                    <div class="form-group">
                        <label for="">Upload Foto 2</label>
                        <input type="file" name="fotob" id="fotobup" class="custom-control" value="<?php echo $data['fotob'] ?>">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <?php if ($data['fotoc'] != '-') { ?>
                        <img src="../assets/img/gambar-produk/<?php echo $data['fotoc'] ?>" style="width: 100px;height: 65px;object-fit: cover; margin-right: 16px;">
                    <?php } else { ?>
                        <img src="../assets/img/nophoto.png" style="width: 100px;height: 65px;object-fit: cover; margin-right: 16px;">
                    <?php } ?>
                </td>
                <td>
                    <div class="form-group">
                        <label for="">Upload Foto 3</label>
                        <input type="file" name="fotoc" class="custom-control" value="<?php echo $data['fotoc'] ?>">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <?php if ($data['fotod'] != '-') { ?>
                        <img src="../assets/img/gambar-produk/<?php echo $data['fotod'] ?>" style="width: 100px;height: 65px;object-fit: cover; margin-right: 16px;">
                    <?php } else { ?>
                        <img src="../assets/img/nophoto.png" style="width: 100px;height: 65px;object-fit: cover; margin-right: 16px;">
                    <?php } ?>
                </td>
                <td>
                    <div class="form-group">
                        <label for="">Upload Foto 4</label>
                        <input type="file" name="fotod" class="custom-control" value="<?php echo $data['fotod'] ?>">
                    </div>
                </td>
            </tr>
        </table>
        
        <div class="form-group">
            <label for="">Item Description</label>
            <input type="text" name="item_desc" class="form-control" value="<?php echo $data['item_desc'] ?>">
        </div>
        <div class="form-group">
            <label for="">Spesifikasi</label>
            <textarea name="spesifikasi" class="form-control" rows="5"><?php echo $spesifikasi ?></textarea>
        </div>
        <div class="form-group">
            <label for="">Harga Satuan</label>
            <input type="text" name="harga" class="form-control" value="<?php echo $data['harga'] ?>">
        </div>



        <div class="form-group text-right">
            <a href="?page=artikel" class="btn"><i class="fas fa-times"></i> Cancel</a>
            <button type="submit" name="ubah" class="btn btn-warning"> <i class="fas fa-pen"></i> Ubah</button>
        </div>
    </form>

</div>

<?php

if (isset($_POST['ubah'])) {
    $id = $_POST['id'];
    $spesifikasi= strtr($_POST['spesifikasi'], array("\r\n" => '<br />', "\r" => '<br />', "\n" => '<br />'));
    $item_desc  = $_POST['item_desc'];
    $harga      = $_POST['harga'];
    $nmfoto     = $_FILES['fotoa']['name'];
    $nmfotob    = $_FILES['fotob']['name'];
    $nmfotoc    = $_FILES['fotoc']['name'];
    $nmfotod    = $_FILES['fotod']['name'];
    $tmpfoto    = $_FILES['fotoa']['tmp_name'];
    $tmpfotob   = $_FILES['fotob']['tmp_name'];
    $tmpfotoc   = $_FILES['fotoc']['tmp_name'];
    $tmpfotod   = $_FILES['fotod']['tmp_name'];

    if (!empty($nmfoto)) {
        move_uploaded_file($tmpfoto, "../assets/img/gambar-produk/" . $nmfoto);
    } else {
        $nmfoto = $data['foto'];
    }

    if (!empty($nmfotob)) {
        move_uploaded_file($tmpfotob, "../assets/img/gambar-produk/" . $nmfotob);
    } else {
        $nmfotob = $data['fotob'];
    }

    if (!empty($nmfotoc)) {
        move_uploaded_file($tmpfotoc, "../assets/img/gambar-produk/" . $nmfotoc);
    } else {
        $nmfotoc = $data['fotoc'];
    }

    if (!empty($nmfotod)) {
        move_uploaded_file($tmpfotod, "../assets/img/gambar-produk/" . $nmfotod);
    } else {
        $nmfotod = $data['fotod'];
    }
    
    $koneksi->query("UPDATE produk SET `item_desc`='$item_desc', spesifikasi='$spesifikasi', `harga`='$harga', `foto`='$nmfoto', `fotob`='$nmfotob', `fotoc`='$nmfotoc', `fotod`='$nmfotod' WHERE id=$id");

    /*if (!empty($nmfoto)) {
        move_uploaded_file($tmpfoto, "../assets/img/gambar-produk/" . $nmfoto);
        if (!empty($nmfotob)) {
            move_uploaded_file($tmpfotob, "../assets/img/gambar-produk/" . $nmfotob);
            if (!empty($nmfotoc)) {
                move_uploaded_file($tmpfotoc, "../assets/img/gambar-produk/" . $nmfotoc);
                if (!empty($nmfotod)) {
                    move_uploaded_file($tmpfotod, "../assets/img/gambar-produk/" . $nmfotod);
                    $koneksi->query("UPDATE produk SET `item_desc`='$item_desc', spesifikasi='$spesifikasi', `harga`='$harga', `foto`='$nmfoto', `fotob`='$nmfotob', `fotoc`='$nmfotoc', `fotod`='$nmfotod' WHERE id=$id");
                } else {
                    $koneksi->query("UPDATE produk SET `item_desc`='$item_desc', spesifikasi='$spesifikasi', `harga`='$harga', `foto`='$nmfoto', `fotob`='$nmfotob', `fotoc`='$nmfotoc' WHERE id=$id");
                }
            } else {
                $koneksi->query("UPDATE produk SET `item_desc`='$item_desc', spesifikasi='$spesifikasi', `harga`='$harga', `foto`='$nmfoto', `fotob`='$nmfotob' WHERE id=$id");
            }
        } else {
            $koneksi->query("UPDATE produk SET `item_desc`='$item_desc', spesifikasi='$spesifikasi', `harga`='$harga', `foto`='$nmfoto' WHERE id=$id");
        }
    } else {
        $koneksi->query("UPDATE produk SET `item_desc`='$item_desc', spesifikasi='$spesifikasi', `harga`='$harga' WHERE id=$id");
    }*/

    $_SESSION['flashmessage']['pesan'] = 'Data berhasil diubah.';
    $_SESSION['flashmessage']['warna'] = 'alert-success';

    echo "<script>location='?page=produk'</script>";
}
?>