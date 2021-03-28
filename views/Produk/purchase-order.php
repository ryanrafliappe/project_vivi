<?php

if (isset($_GET['id-produk'])) {
}

$id_user = $_GET['id-produk'];

$sql = "SELECT * FROM produk WHERE id = '$id_user' ";
$query = mysqli_query($koneksi, $sql);

$data = mysqli_fetch_assoc($query);

$id = $_GET['id-log'];
$s = "SELECT * FROM produk_log WHERE id = '$id' ";
$q = mysqli_query($koneksi, $s);

$datas = mysqli_fetch_assoc($q);


?>

<div class="container">
    <h1 class="mt-4">Purchase Order </h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">Produk</li>
        <li class="breadcrumb-item">Riwayat</li>
        <li class="breadcrumb-item active">Purchase Order</li>

    </ol>

    <?php
    $id = $_SESSION['login']['id'];
    ?>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-lg-6">
                <div class="card shadow  mb-4">
                    <div class="card-header bg-primary text-light">
                        Supplier Details
                    </div>
                    <div class="card-body">

                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="supplier_name" value="PT. Anugrah Teknik Mandiris" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Contact</label>
                            <input type="text" name="supplier_contact" value="(0411) 452455 " class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Address</label>
                            <input type="text" name="supplier_address" value="Komp. Ruko New Zamrud F.17 Jl. A.P. Pettarani Makassar " class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Contact Person</label>
                            <input type="text" name="supplier_contact_person" value="(0411) 452455 " class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" name="supplier_email" value="anugerahtehnik_mandiri@yahoo.com" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Payment Terms</label>
                            <input type="text" name="supplier_payment" placeholder="supplier_payment" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Freight Terms</label>
                            <input type="text" name="supplier_freight" placeholder="supplier_freight" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Shipping Method</label>
                            <input type="text" name="supplier_shipping" placeholder="supplier_shipping" class="form-control">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card shadow mb-4">
                    <div class="card-header bg-primary text-light">
                        Perusahaan
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Logo Perusahaan</label>
                            <input type="file" name="logo_perusahaan" class="custom-file">
                        </div>
                        <div class="form-group">
                            <label for="">Nama Perusahaan</label>
                            <input type="text" name="nama_perusahaan" placeholder="Nama Perusahaan" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <input type="text" name="alamat_perusahaan" placeholder="Alamat" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Nomor Telepon</label>
                            <input type="text" name="nomor_telepon" placeholder="nomor telepon" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Provinsi</label>
                            <input type="text" name="provinsi" placeholder="provinsi" class="form-control">
                        </div>

                    </div>
                </div>

                <div class="card shadow  mb-4">
                    <div class="card-header bg-primary text-light">
                        <?= $_GET['item_desc'] ?>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Price (Rp)</label>
                                    <input type="text" readonly value="<?= "Rp " . number_format(($datas['harga']), 0, ',', '.') . ',-'; ?>" class="form-control">
                                    <input type="hidden" name="harga" value="<?= $datas['harga'] ?>">
                                    <input type="hidden"  name="terbilang" value="<?= $datas['terbilang'] ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="">Quantity</label>
                                    <input type="number" name="quantity" value="1" class="form-control">
                                    <input type="hidden" name="idproduk" value="<?= $_GET['id-produk'] ?>">
                                    <input type="hidden" name="id_user" value="<?= $_GET['id-user'] ?>">
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="form-group">
                                    <label for="">UOM</label>
                                    <input type="text" name="uom" class="form-control" value="Unit" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="card shadow">
                    <div class="card-header bg-primary text-light">
                        General
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Procurement BU</label>
                            <input type="text" placeholder="Procurement BU" name="proc_bu" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Requisitioning BU</label>
                            <input type="text" placeholder="Requisitioning BU" name="req_bu" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Bill To Location</label>
                            <textarea name="bill_location" id="" cols="30" rows="5" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Default Ship To Location</label>
                            <textarea name="ship_location" id="" cols="30" rows="5" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">PO Number</label>
                            <input type="text" name="po_number" value="<?= $_GET['log-code'] ?>" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Date</label>
                            <input type="text" name="date" value="<?= date("Y-m-d") ?>" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Revision</label>
                            <input type="text" name="revision" placeholder="0" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Buyer</label>
                            <input type="text" name="buyer" placeholder="Buyer Name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Currency</label>
                            <input type="text" name="currency" placeholder="IDR" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Status</label>
                            <input type="text" name="status" placeholder="status" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <input type="text" name="description" placeholder="deskripsi" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Delivery Date</label>
                            <input type="date" name="deliverydate" placeholder="delivery date" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">First Approver</label>
                            <input type="text" name="first_approver" placeholder="first_approver" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Last Approver</label>
                            <input type="text" name="last_approver" placeholder="last_approver" class="form-control">
                        </div>
                        <input type="hidden" name="spesifikasi" value="<?= $data['spesifikasi'] ?>" class="form-control">
                        <input type="hidden" name="item_desc" value="<?= $data['item_desc'] ?>" class="form-control" readonly>
                        <div class="form-group text-right">
                            <button class="btn btn-primary" name="next">Next</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </form>

</div>
<br>

<?php

if (isset($_POST['next'])) {
    $supplier_name = $_POST['supplier_name'];
    $supplier_contact = $_POST['supplier_contact'];
    $supplier_address = $_POST['supplier_address'];
    $supplier_contact_person = $_POST['supplier_contact_person'];
    $supplier_email = $_POST['supplier_email'];
    $supplier_payment = $_POST['supplier_payment'];
    $supplier_freight = $_POST['supplier_freight'];
    $supplier_shipping = $_POST['supplier_shipping'];

    $logo_perusahaan = $_FILES['logo_perusahaan']['name'];
    $logo_perusahaan_tmp = $_FILES['logo_perusahaan']['tmp_name'];
    $nama_perusahaan = $_POST['nama_perusahaan'];
    $alamat = $_POST['alamat_perusahaan'];
    $nomor_telepon = $_POST['nomor_telepon'];
    $provinsi = $_POST['provinsi'];

    $proc_bu = $_POST['proc_bu'];
    $req_bu = $_POST['req_bu'];
    $bill_loc = $_POST['bill_location'];
    $ship_location = $_POST['ship_location'];
    $po_number = $_POST['po_number'];
    $date = $_POST['date'];
    $revision = $_POST['revision'];
    $buyer = $_POST['buyer'];
    $currency = $_POST['currency'];
    $status = $_POST['status'];
    $description = $_POST['description'];
    $first_approver = $_POST['first_approver'];
    $last_approver = $_POST['last_approver'];
    $spesifikasi = $_POST['spesifikasi'];
    $delivery_date = date('d-m-Y', strtotime($_POST['deliverydate']));

    $idproduk = $_POST['idproduk'];
    $qty = $_POST['quantity'];
    $uom = $_POST['uom'];
    $price = $_POST['harga'];
    $terbilang = $_POST['terbilang'];
    $item_desc = $_POST['item_desc'];
    $totalharga = $price * $qty;
    $date = date('Y-m-d');

    $iduser = $_POST['id_user'];

    move_uploaded_file($logo_perusahaan_tmp, "../assets/img/logo-perusahaan/$logo_perusahaan");

    $koneksi->query("INSERT INTO `purchase_order`(`id_produk`, `price`, `qty`, `uom`, `total_harga`, `supplier_name`, `supplier_contact`, `supplier_address`, `supplier_contact_person`, `supplier_email`, `supplier_payment_terms`, `supplier_freight_terms`, `supplier_shipping_method`, `perusahaan_logo`, `perusahaan_nama`, `perusahaan_alamat`, `perusahaan_nomor_telp`, `perusahaan_provinsi`, `procurement_bu`, `req_bu`, `bill_to_location`, `default_ship_to_location`, `po_number`, `date`, `revision`, `buyer`, `Currency`, `status`, `description`, `first_approver`, `last_approver`, `spesifikasi`, `item_desc`, `delivery_date`)
    VALUES ('$idproduk','$price','$qty','$uom','$totalharga','$supplier_name','$supplier_contact','$supplier_address','$supplier_contact_person','$supplier_email','$supplier_payment','$supplier_freight','$supplier_shipping','$logo_perusahaan','$nama_perusahaan','$alamat','$nomor_telepon','$provinsi','$proc_bu','$req_bu','$bill_loc','$ship_location','$po_number','$date','$revision','$buyer','$currency','$status','$description','$first_approver','$last_approver','$spesifikasi','$item_desc', '$delivery_date') ");

    $koneksi->query("INSERT INTO `produk_log`(`id_user`, `id_produk`, `log_code`, nama_perusahaan, alamat_perusahaan, kota, `nama_surat`, harga, terbilang, `jenis_surat`, `status_log`, date) VALUES ('$iduser','$idproduk','$po_number','$supplier_name','$supplier_address','Makassar','PO','$totalharga','$terbilang','PO','MENUNGGU INVOICE','$date')");

    $koneksi->query("UPDATE `produk_log` SET status_log = 'Menunggu Invoice' WHERE log_code = '$po_number'");

    $_SESSION['flashmessage']['pesan'] = 'Data berhasil ditambahkan.';
    $_SESSION['flashmessage']['warna'] = 'alert-success';

    echo "<script>location='?page=produk-riwayat'</script>";
}
