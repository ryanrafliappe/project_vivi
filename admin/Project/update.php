<?php

        $id = $_POST['id'];
        $nmfile = $_FILES['surat_balasan']['name'];
        $tmpfile = $_FILES['surat_balasan']['tmp_name'];
    
        if (!empty($nmfile)) {
            move_uploaded_file($tmpfile, "../assets/dokumen/" . $nmfile);
            $koneksi->query("UPDATE project SET status='Terkirim', surat_balasan='$nmfile' WHERE id = '$id'");
        } else {
            $koneksi->query("UPDATE project SET status='Terkirim' WHERE id=$id");
        }
    
        $_SESSION['flashmessage']['pesan'] = 'Data berhasil dikirim.';
        $_SESSION['flashmessage']['warna'] = 'alert-success';
    
        echo "<script>location='?page=project'</script>";

?>