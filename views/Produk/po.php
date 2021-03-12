<?php

require_once '../../assets/vendor/mpdf/autoload.php';
include '../../conf/koneksi.php';

$mpdf = new \Mpdf\Mpdf([
    'orientation' => 'L'
]);

$datas = $koneksi->query("SELECT * FROM `purchase_order` WHERE po_number = '" . $_GET['logcode'] . "'");
$data = $datas->fetch_assoc();
$hargasatuan = $data['price'] + ($data['price'] * 0.1);
$hargatotal = $data['total_harga'] + ($data['total_harga'] * 0.1);
var_dump($hargasatuan);
var_dump($hargatotal);
die();

$item_descs = $koneksi->query("SELECT * FROM produk WHERE id = '" . $data['id_produk'] . "'");
$item_desc = $item_descs->fetch_assoc();

$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="">' . $data['perusahaan_nama'] . '</div>
    <div class="">' . $data['perusahaan_alamat'] . '</div>
    <div class="">' . $data['perusahaan_nomor_telp'] . '</div>
    <div class="">' . $data['perusahaan_provinsi'] . '</div>
    <h1 style="text-align: center">PURCHASE ORDER</h1>
    <br>

    <table border="1" cellpadding="5" cellspacing="0" style="width: 100%;">
        <tr>
            <td colspan=2><b>Supplier Details</b></td>
            <td><b>Procurement BU</b></td>
            <td>' . $data['procurement_bu'] . '</td>
            <td><b>PO Number</b></td>
            <td>' . $data['po_number'] . '</td>
        </tr>
        <tr>
            <td><b>Name</b></td>
            <td>' . $data['supplier_name'] . '</td>
            <td><b>Req BU</b></td>
            <td>' . $data['req_bu'] . '</td>
            <td><b>Date</b></td>
            <td>' . date("d-m-Y") . '</td>
        </tr>
        <tr>
            <td><b>Contact</b></td>
            <td>' . $data['supplier_contact'] . '</td>
            <td rowspan=4><b>Bill To Location</b></td>
            <td rowspan=4>' . $data['bill_to_location'] . '</td>
            <td rowspan=2><b>Currency</b></td>
            <td rowspan=2>' . $data['Currency'] . '</td>
        </tr>
        <tr>
            <td rowspan=2><b>Address</b></td>
            <td rowspan=2>' . $data['supplier_address'] . '</td>
         
         
        </tr>
        <tr>
            <td rowspan=2><b>Buyer</b></td>
            <td rowspan=2>' . $data['buyer'] . '</td>
        </tr>
       
        <tr>
            <td><b>Contact Person</b></td>
            <td>' . $data['supplier_contact_person'] . '</td>
        </tr>

        <tr>
            <td><b>Email</b></td>
            <td>' . $data['supplier_email'] . '</td>
            <td rowspan=7><b>Default Ship To Location</b></td>
            <td rowspan=7>' . $data['default_ship_to_location'] . '</td>
            <td rowspan=7><b>Description</b></td>
            <td rowspan=7>' . $data['description'] . '</td>

        </tr>
        <tr>
            <td><b>Payment Terms</b></td>
            <td>' . $data['supplier_payment_terms'] . '</td>
        </tr>
        <tr>
            <td><b>Freight Terms</b></td>
            <td>' . $data['supplier_freight_terms'] . '</td>
        </tr>
        <tr>
            <td><b>Shipping Methods</b></td>
            <td>' . $data['supplier_shipping_method'] . '</td>
        </tr>
    </table>
<br>
    <table border="1" cellpadding="5" cellspacing="0" style="width: 100%;">
        <tr>
            <th style="background-color: #add8e6">Item Number</th>
            <th style="background-color: #add8e6">Item Description</th>
            <th style="background-color: #add8e6">QTY</th>
            <th style="background-color: #add8e6">UOM</th>
            <th style="background-color: #add8e6">Price</th>
            <th style="background-color: #add8e6">Total Price</th>
        </tr>
        <tr>
            <td>' . date("Y") . $data['id_produk'] . '</td>
            <td>' . $item_desc['item_desc'] . '</td>
            <td>' . $data['qty'] . '</td>
            <td>' . $data['uom'] . '</td>
            <td>' . number_format($hargasatuan, 0, ',', '.') . '</td>
            <td>' . number_format($hargatotal) . '</td>
        </tr>
    </table>
';


$html .= '</body>
</html>';
$mpdf->WriteHTML("$html");
$mpdf->Output();
