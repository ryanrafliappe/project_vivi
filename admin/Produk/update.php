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
                        <img id="fotoaid" src="../assets/img/gambar-produk/<?php echo $data['foto'] ?>" style="width: 100px;height: 65px;object-fit: cover; margin-right: 16px; margin-left: 20px;">
                    <?php } ?>
                </td>
                <td>
                    <div class="form-group">
                        <label for="">Upload Foto 1</label>
                        <input type="file" id="fotoain" name="fotoa" class="custom-control" value="<?php echo $data['foto'] ?>">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <?php if ($data['fotob'] != '-') {
                        $imgsrb = "gambar-produk/" . $data['fotob'];
                        $delb = 'trash.png';
                    } else {
                        $imgsrb = "nophoto.png";
                        $delb = 'trashdis.png';
                    } ?>
                    <input type='image' src='../assets/img/<?php echo $delb ?>' id='delfotob'>
                    <img id="fotobid" src="../assets/img/<?php echo $imgsrb ?>" style="width: 100px;height: 65px;object-fit: cover; margin-right: 16px;">
                </td>
                <td>
                    <div class="form-group">
                        <label for="">Upload Foto 2</label>
                        <input type="file" name="fotob" id="fotobin" class="custom-control" value="<?php echo $data['fotob'] ?>">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <?php if ($data['fotoc'] != '-') { 
                        $imgsrc = "gambar-produk/" . $data['fotoc'];
                        $delc = 'trash.png';
                    } else {
                        $imgsrc = "nophoto.png";
                        $delc = 'trashdis.png';
                    } ?>
                    <!-- <img id="fotocid" src="../assets/img/<?php echo $imgsrc ?>" style="width: 100px;height: 65px;object-fit: cover; margin-right: 16px;"> -->
                    <input type='image' src='../assets/img/<?php echo $delc ?>' id='delfotoc'>
                    <img id="fotocid" src="../assets/img/<?php echo $imgsrc ?>" alt="your image" style="width: 100px;height: 65px;object-fit: cover; margin-right: 16px;" />
                </td>
                <td>
                    <div class="form-group">
                        <label for="">Upload Foto 3</label>
                        <input type="file" id="fotocin" name="fotoc" class="custom-control" value="<?php echo $data['fotoc'] ?>">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <?php if ($data['fotod'] != '-') {
                        $imgsrd = "gambar-produk/" . $data['fotod'];
                        $deld = 'trash.png';
                    } else {
                        $imgsrd = "nophoto.png";
                        $deld = 'trashdis.png';
                    } ?>
                    <input type='image' src='../assets/img/<?php echo $deld ?>' id='delfotod'>
                    <img id="fotodid" src="../assets/img/<?php echo $imgsrd ?>" style="width: 100px;height: 65px;object-fit: cover; margin-right: 16px;">
                </td>
                <td>
                    <div class="form-group">
                        <label for="">Upload Foto 4</label>
                        <input type="file" id="fotodin" name="fotod" class="custom-control" value="<?php echo $data['fotod'] ?>">
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
    } else if (!empty($_POST['fotobin'])) {
        $nmfotob = $data['fotob'];
    } else {
        $nmfotob = '-';
    }

    if (!empty($nmfotoc)) {
        move_uploaded_file($tmpfotoc, "../assets/img/gambar-produk/" . $nmfotoc);
    } else if (!empty($_POST['fotocin'])){
        $nmfotoc = $data['fotoc'];
    } else {
        $nmfotoc = '-';
    }

    if (!empty($nmfotod)) {
        move_uploaded_file($tmpfotod, "../assets/img/gambar-produk/" . $nmfotod);
    } else if (!empty($_POST['fotodin'])) {
        $nmfotod = $data['fotod'];
    } else {
        $nmfotod = '-';
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">

    function readURLa(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#fotoaid').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }

    function readURLb(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#fotobid').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
            $("#delfotob").attr('src', '../assets/img/trash.png');
            $("#delfotob").removeAttr('disabled');
        }
    }

    function readURLc(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#fotocid').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
            $("#delfotoc").attr('src', '../assets/img/trash.png');
            $("#delfotoc").removeAttr('disabled');
        }
    }

    function readURLd(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#fotodid').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
            $("#delfotod").attr('src', '../assets/img/trash.png');
            $("#delfotod").removeAttr('disabled');
        }
    }
    
    $("#fotoain").change(function(){
        readURLa(this);
    });

    $("#fotobin").change(function(){
        readURLb(this);
    });
    
    $("#fotocin").change(function(){
        readURLc(this);
    });

    $("#fotodin").change(function(){
        readURLd(this);
    });

    $("#delfotob").click(function(e) {
        e.preventDefault();
        $("#fotobid").attr('src', '../assets/img/nophoto.png');
        $("#fotobin").val("");
        $("#delfotob").attr('src', '../assets/img/trashdis.png');
        $("#delfotob").attr('disabled');
    });

    $("#delfotoc").click(function(e) {
        e.preventDefault();
        $("#fotocid").attr('src', '../assets/img/nophoto.png');
        $("#fotocin").val("");
        $("#delfotoc").attr('src', '../assets/img/trashdis.png');
        $("#delfotoc").attr('disabled');
    });

    $("#delfotod").click(function(e) {
        e.preventDefault();
        $("#fotodid").attr('src', '../assets/img/nophoto.png');
        $("#fotodin").val("");
        $("#delfotod").attr('src', '../assets/img/trashdis.png');
        $("#delfotod").attr('disabled');
    });
</script>