<?php

require_once '../../assets/vendor/mpdf/autoload.php';
include '../../conf/koneksi.php';

$mpdf = new \Mpdf\Mpdf([
    'orientation' => 'P'
]);

$datas = $koneksi->query("SELECT * FROM `purchase_order` WHERE po_number = '" . $_GET['logcode'] . "'");
$data = $datas->fetch_assoc();

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
    <img src="../../assets/img/logo-perusahaan/'.$data['perusahaan_logo'].'" alt="" srcset="" width="150px">
    <div class="">' . $data['perusahaan_nama'] . '</div>
    <div class="">' . $data['perusahaan_alamat'] . '</div>
    <div class="">' . $data['perusahaan_nomor_telp'] . '</div>
    <div class="">' . $data['perusahaan_provinsi'] . '</div>
    <h1 style="text-align: center">PURCHASE ORDER</h1>
    <br>

    <table cellpadding="5" cellspacing="0" style="width: 100%;border: 0.01px solid black;border-collapse: collapse;">
        <tr>
            <td colspan=2 style="border: 0.01px solid black;"><b>Supplier Details</b></td>
            <td style="border: 0.01px solid black;"><b>Procurement BU</b></td>
            <td style="border: 0.01px solid black;">' . $data['procurement_bu'] . '</td>
            <td style="border: 0.01px solid black;"><b>PO Number</b></td>
            <td style="border: 0.01px solid black;">' . $data['po_number'] . '</td>
        </tr>
        <tr>
            <td style="border: 0.01px solid black;"><b>Name</b></td>
            <td style="border: 0.01px solid black;">' . $data['supplier_name'] . '</td>
            <td style="border: 0.01px solid black;"><b>Req BU</b></td>
            <td style="border: 0.01px solid black;">' . $data['req_bu'] . '</td>
            <td style="border: 0.01px solid black;"><b>Date</b></td>
            <td style="border: 0.01px solid black;">' . date("d-m-Y") . '</td>
        </tr>
        <tr>
            <td style="border: 0.01px solid black;"><b>Contact</b></td>
            <td style="border: 0.01px solid black;">' . $data['supplier_contact'] . '</td>
            <td rowspan=4 style="border: 0.01px solid black;"><b>Bill To Location</b></td>
            <td rowspan=4 style="border: 0.01px solid black;">' . $data['bill_to_location'] . '</td>
            <td rowspan=2 style="border: 0.01px solid black;"><b>Currency</b></td>
            <td rowspan=2 style="border: 0.01px solid black;">IDR</td>
        </tr>
        <tr>
            <td rowspan=2 style="border: 0.01px solid black;"><b>Address</b></td>
            <td rowspan=2 style="border: 0.01px solid black;">' . $data['supplier_address'] . '</td>


        </tr>
        <tr>
            <td rowspan=2 style="border: 0.01px solid black;"><b>Buyer</b></td>
            <td rowspan=2 style="border: 0.01px solid black;">' . $data['buyer'] . '</td>
        </tr>

        <tr>
            <td style="border: 0.01px solid black;"><b>Contact Person</b></td>
            <td style="border: 0.01px solid black;">' . $data['supplier_contact_person'] . '</td>
        </tr>

        <tr>
            <td style="border: 0.01px solid black;"><b>Email</b></td>
            <td style="border: 0.01px solid black;">' . $data['supplier_email'] . '</td>
            <td rowspan=7 style="border: 0.01px solid black;"><b>Default Ship To Location</b></td>
            <td rowspan=7 style="border: 0.01px solid black;">' . $data['default_ship_to_location'] . '</td>
            <td rowspan=7 style="border: 0.01px solid black;"><b>Description</b></td>
            <td rowspan=7 style="border: 0.01px solid black;">' . $data['description'] . '</td>

        </tr>
        <tr>
            <td style="border: 0.01px solid black;"><b>Payment Terms</b></td>
            <td style="border: 0.01px solid black;">' . $data['supplier_payment_terms'] . '</td>
        </tr>
        <tr>
            <td style="border: 0.01px solid black;"><b>Freight Terms</b></td>
            <td style="border: 0.01px solid black;">' . $data['supplier_freight_terms'] . '</td>
        </tr>
        <tr>
            <td style="border: 0.01px solid black;"><b>Shipping Methods</b></td>
            <td style="border: 0.01px solid black;">' . $data['supplier_shipping_method'] . '</td>
        </tr>

    </table>
<br>
    <table cellpadding="5" cellspacing="0" style="width: 100%;border: 0.01px solid black;border-collapse: collapse;text-align:center;">
        <tr>
            <th style="background-color: #add8e6; border: 0.01px solid black;">Item Number</th>
            <th style="background-color: #add8e6; border: 0.01px solid black;">Item Description</th>
            <th style="background-color: #add8e6; border: 0.01px solid black;">QTY</th>
            <th style="background-color: #add8e6; border: 0.01px solid black;">UOM</th>
            <th style="background-color: #add8e6; border: 0.01px solid black;">Delivery Date</th>
            <th style="background-color: #add8e6; border: 0.01px solid black;">Price</th>
            <th style="background-color: #add8e6; border: 0.01px solid black;">Total Price</th>
        </tr>
        <tr>
            <td style="border: 0.01px solid black;">' . date("Y") . $data['id_produk'] . '</td>
            <td style="border: 0.01px solid black;">' . $item_desc['item_desc'] . '</td>
            <td style="border: 0.01px solid black;">' . $data['qty'] . '</td>
            <td style="border: 0.01px solid black;">' . $data['uom'] . '</td>
            <td style="border: 0.01px solid black;">' . $data['delivery_date'] . '</td>
            <td style="border: 0.01px solid black;">' . number_format(($data['price']), 0, ',', '.') . '</td>
            <td style="border: 0.01px solid black;">' . number_format(($data['total_harga']), 0, ',', '.') . '</td>
        </tr>
    </table>
<br>

<table border="0" width="100%" >
  <tr>
    <th width="60%">
    <table border="1" cellpadding="5" cellspacing="0" style="width:100%; border-collapse: collapse; ">
      <tbody>
        <tr>
          <td style="width:130px; border: 0.01px solid black"> Note to Supplier</td>
          <td style="border: 0.01px solid black;"> </td>
        </tr>
        <tr>
          <td style="width:130px; border: 0.01px solid black"> Note to Receiver</td>
          <td style="border: 0.01px solid black;"> </td>
        </tr>
        <tr>
          <td style="width:130px; border: 0.01px solid black"> Attachments</td>
          <td style="border: 0.01px solid black;"> </td>
        </tr>
      </tbody>
    </table>
    <th>

    <th>

    </th>

    <th width="40%">
    <table cellpadding="5" cellspacing="0" style="width:100%; border-collapse: collapse; ">
      <tbody>
        <tr>
          <td width="40%" style="border: 0.01px solid black;"> Ordered Amount</td>
          <td width="40%" style="border: 0.01px solid black;">' . number_format(($data['total_harga']), 0, ',', '.') . '</td>
        </tr>
        <tr>
          <td width="40%" style="border: 0.01px solid black;"> Tax</td>
          <td width="40%" style="border: 0.01px solid black;"> 0,00 </td>
        </tr>
        <tr>
          <td width="40%" style="border: 0.01px solid black;"> Total Amount</td>
          <td width="40%" style="border: 0.01px solid black;">' . number_format(($data['total_harga']), 0, ',', '.') . '</td>
        </tr>
      </tbody>
    </table>
    </th>
  </tr>
</table>



<br><br>
    <table width="100%">
        <tr>
            <th>FIRST APPROVER</th>
            <th>LAST APPROVER</th>
        </tr>
       <tr >
                <td style="text-align: center">' .$data['first_approver'] . '</td>
                <td style="text-align: center">'.$data['last_approver'].'</td>
       </tr>
    </table>
';


$html .= '</body>
</html>';
$mpdf->WriteHTML("$html");
$mpdf->Output();
