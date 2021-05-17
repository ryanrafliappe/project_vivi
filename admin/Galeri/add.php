<div class="container-fluid">
    <h1 class="mt-4">Tambah Galeri </h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="?page=galeri">Galeri</a></li>
        <li class="breadcrumb-item active">Tambah Galeri</li>
    </ol>

    <form action="" method="post" enctype="multipart/form-data" class="mt-4">
        <div class="form-group">
            <label for="">Kategori</label><br>
            <select name="kategori" class="custom-select col-md-4" id="validationCustom04" required>
                <option value="Produk">Produk</option>
                <option value="Project">Project</option>
            </select>
        </div>
        <div class="form-group">
            <label for="">Upload Foto</label>
            <!-- <input type="file" name="foto" class="custom-control" required> -->
            <input type="file" id="upload" name="foto" class="custom-control" required accept="image/*" onchange="uploadGambar()">
        </div>
        <div class="form-group">
            <label for="">Keterangan</label>
            <textarea name="keterangan" class="ckeditor" cols="30" rows="10"></textarea>
        </div>
        <div class="form-group text-right">
            <a href="?page=galeri" class="btn"><i class="fas fa-times"></i> Cancel</a>
            <button type="submit" name="save" class="btn btn-primary"> <i class="fas fa-save"></i> Save</button>
        </div>
    </form>
</div>

<script type="text/javascript">
  function uploadGambar(){
    var tipeDokumen = document.getElementById("upload").value;
    var res1 = tipeDokumen.match(".jpg");
    var res2 = tipeDokumen.match(".jpeg");
    var res3 = tipeDokumen.match(".png");
    var res4 = tipeDokumen.match(".JPG");
    var res5 = tipeDokumen.match(".JPEG");
    var res6 = tipeDokumen.match(".PNG");

    if (res1 ){
      // alert("Maaf, Hanya dapat mengupload gambar");
      alert("Foto terupload");
      // document.getElementById("upload").value="";
    }else if (res2 ){
      alert("Foto terupload");
    }else if (res3 ){
      alert("Foto terupload");
    }else if (res4 ){
      alert("Foto terupload");
    }else if (res5 ){
      alert("Foto terupload");
    }else if (res6 ){
      alert("Foto terupload");
    }else {
      alert("Maaf, Hanya dapat mengupload gambar");
      document.getElementById("upload").value="";
    }
  }
</script>
<?php

if (isset($_POST['save'])) {

    $keterangan = $_POST['keterangan'];
    $kategori = $_POST['kategori'];
    $nmfoto = $_FILES['foto']['name'];
    $tmpfoto = $_FILES['foto']['tmp_name'];
    $error = $_FILES['foto']['error'];
    $nmfoto = uniqid() . $nmfoto;
    $tanggal = date("Y-m-d H:i:s");

    if ($error == "4") {
    } else {
        move_uploaded_file($tmpfoto, "../assets/img/" . $nmfoto);
        $koneksi->query("INSERT INTO `galeri`(`foto`, `kategori`, `keterangan`, `tanggal`)
         VALUES ('$nmfoto', '$kategori', '$keterangan', '$tanggal')");
    }


    $_SESSION['flashmessage']['pesan'] = 'Data berhasil ditambahkan.';
    $_SESSION['flashmessage']['warna'] = 'alert-success';

    echo "<script>location='?page=galeri'</script>";

}
