<?php

if(isset($_GET['id'])){

    $id = $_GET['id'];

    $sql = "DELETE FROM riwayat_pekerjaan WHERE id='$id'";
    $query = mysqli_query($koneksi, $sql);

    if($query){
        $_SESSION['flashmessage']['pesan'] = 'Data berhasil dihapus.';
        $_SESSION['flashmessage']['warna'] = 'alert-success';
    
        echo "<script>location='index.php?page=riwayat-pekerjaan'</script>"; 
    }

}

?>