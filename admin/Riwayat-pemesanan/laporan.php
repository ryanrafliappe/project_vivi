<?php
require_once '../../assets/vendor/mpdf/autoload.php';
include '../../conf/koneksi.php';
include 'terbilang.php';

$statusTombol = "Tidak";
$tgl_awal = $_GET['tgl_awal'];
$tgl_akhir = $_GET['tgl_akhir'];
$jabatannya = $_GET['jabatan'];
$namanya = $_GET['nama'];

$statusTombol = $_GET['kondisiTombol'];
$mpdf = new \Mpdf\Mpdf([
    'format' => 'A4-P'
]);

function tanggal_indonesia($tanggal){
    $bulan = array (
    1 =>   'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember'
    );

    $pecahkan = explode('-', $tanggal);

    return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}


  $tanggal_awal = tanggal_indonesia($tgl_awal);
  $tanggal_akhir = tanggal_indonesia($tgl_akhir);
  $now = date("Y-m-d");

  if ($statusTombol > 0) {
    $status = "Laporan Penjualan dari tanggal $tanggal_awal hingga tanggal $tanggal_akhir ";
    $get = $koneksi->query("SELECT purchase_order.date as date_po, produk_log.date as date_log, perusahaan_nama,buyer,item_desc,qty,price,ongkir
      FROM purchase_order JOIN produk_log ON purchase_order.po_number=produk_log.log_code WHERE `status_log`='SELESAI' AND `jenis_surat`='INVOICE'
      AND purchase_order.date between '$tgl_awal' and '$tgl_akhir' GROUP BY log_code");
  } else{
    $status = "";
    $get = $koneksi->query("SELECT purchase_order.date as date_po, produk_log.date as date_log, perusahaan_nama,buyer,item_desc,qty,price,ongkir
      FROM purchase_order JOIN produk_log ON purchase_order.po_number=produk_log.log_code WHERE `status_log`='SELESAI' AND `jenis_surat`='INVOICE'
      GROUP BY log_code");
  }

$no = 1;
$totalPenjualan = 0;

$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>
<body>
    <img src="kopSurat.PNG" >
    <br>
    <p>'.$status.'</p>

    <table cellpadding="5" cellspacing="0" style="width: 100%;border: 0.01px solid black;border-collapse: collapse;">
        <tr>
            <th style="background-color: #add8e6;border: 0.01px solid black;">No</th>
            <th style="background-color: #add8e6;border: 0.01px solid black;">Tanggal</th>
            <th style="background-color: #add8e6;border: 0.01px solid black;">Nama Perusahaan</th>
            <th style="background-color: #add8e6;border: 0.01px solid black;">Nama Pembeli</th>
            <th style="background-color: #add8e6;border: 0.01px solid black;">Pesanan</th>
            <th style="background-color: #add8e6;border: 0.01px solid black;">Jumlah</th>
            <th style="background-color: #add8e6;border: 0.01px solid black;">Harga Satuan</th>
            <th style="background-color: #add8e6;border: 0.01px solid black;">Harga Ongkir</th>
            <th style="background-color: #add8e6;border: 0.01px solid black;">Total Harga</th>
        </tr>
';


while ($data = $get->fetch_assoc()) :
  $hargappn = $data['price'] + ($data['price'] * 0.1);
  $totalharga = ($hargappn * $data['qty']) + $data['ongkir'];

    $html .= '<tr>
            <td style="border: 0.01px solid black;"> ' . $no . ' </td>
            <td style="border: 0.01px solid black;"> ' . $data['date_log'] . ' </td>
            <td style="border: 0.01px solid black;"> ' . $data['perusahaan_nama'] . '</td>
            <td style="border: 0.01px solid black;"> ' . $data['buyer'] . ' </td>
            <td style="border: 0.01px solid black;"> ' . $data['item_desc'] . ' </td>
            <td style="border: 0.01px solid black;"> ' . $data['qty'] . ' </td>
            <td style="border: 0.01px solid black;"> ' . number_format($hargappn) . ' </td>
            <td style="border: 0.01px solid black;"> ' . number_format($data['ongkir']) . ' </td>
            <td style="border: 0.01px solid black;"> ' . number_format($totalharga) . ' </td>
        </tr>
        ';
        $totalPenjualan = $totalPenjualan + $totalharga;
    $no++;
endwhile;
$terbilang = terbilang($totalPenjualan) . " rupiah";
$html .= '
<tr>
  <td colspan="8">Total Penjualan</td>
  <td>'.number_format($totalPenjualan).'</td>
</tr>
<tr style="border: 0.01px solid black;">
  <td colspan="2">Terbilang</td>
  <td colspan="8" style="text-align: right;">'.$terbilang.'</td>
</tr>
</table>
<table style="float:right;text-align:right;width:100%;">
  <tr>
    <td><table style="text-align:center"><tr><td>

    Makassar, '. tanggal_indonesia($now) .'
    <br>
    '. $jabatannya .'
    <br><br><br><br><br><br>
    ('. $namanya .')
    </td></tr></table></td>
  </tr>

</table>
</body>
</html>';
$mpdf->WriteHTML("$html");
$mpdf->Output('laporanPenjualan.pdf', \Mpdf\Output\Destination::DOWNLOAD);
