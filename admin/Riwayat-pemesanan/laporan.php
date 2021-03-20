<?php

require_once '../../assets/vendor/mpdf/autoload.php';
include '../../conf/koneksi.php';

$mpdf = new \Mpdf\Mpdf([
    'orientation' => 'P'
]);

$get = $koneksi->query("SELECT * FROM purchase_order JOIN produk_log ON purchase_order.po_number=produk_log.log_code WHERE `status_log`='SELESAI' GROUP BY log_code");

$no = 1;

$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1 style="text-align: center">Laporan Penjualan</h1>
    <br>

    <table border="1" cellpadding="5" cellspacing="0" style="width: 100%;">
        <tr>
            <th style="background-color: #add8e6">No</th>
            <th style="background-color: #add8e6">Tanggal</th>
            <th style="background-color: #add8e6">Nama Perusahaan</th>
            <th style="background-color: #add8e6">Nama Pembeli</th>
            <th style="background-color: #add8e6">Pesanan</th>
            <th style="background-color: #add8e6">Jumlah</th>
            <th style="background-color: #add8e6">Total Harga</th>
        </tr>
';

while ($data = $get->fetch_assoc()) : 
    $html .= '<tr>
            <td> ' . $no . ' </td>
            <td> ' . $data['date'] . ' </td>
            <td> ' . $data['perusahaan_nama'] . '</td>
            <td> ' . $data['buyer'] . ' </td>
            <td> ' . $data['item_desc'] . ' </td>
            <td> ' . $data['qty'] . ' </td>
            <td> ' . number_format($data['total_harga']) . ' </td>
        </tr>
        ';
    $no++;
endwhile;

$html .= '</table>
</body>
</html>';
$mpdf->WriteHTML("$html");
$mpdf->Output();