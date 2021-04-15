<?php
require_once '../../assets/vendor/mpdf/autoload.php';
include '../../conf/koneksi.php';

// $waktu = $_GET['filter'];
$waktu = $_GET['filter'];
$mpdf = new \Mpdf\Mpdf([
    'orientation' => 'P'
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

    // variabel pecahkan 0 = tahun
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tanggal

    return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}

// $get = $koneksi->query("SELECT * FROM purchase_order JOIN produk_log ON purchase_order.po_number=produk_log.log_code WHERE `status_log`='SELESAI' AND `jenis_surat`='INVOICE' GROUP BY log_code");
$get = $koneksi->query("SELECT purchase_order.date as date_po, produk_log.date as date_log, perusahaan_nama,buyer,item_desc,qty,price,ongkir
  FROM purchase_order JOIN produk_log ON purchase_order.po_number=produk_log.log_code WHERE `status_log`='SELESAI' AND `jenis_surat`='INVOICE'
  GROUP BY log_code");
  $minggu1 = date("Y-m-d", strtotime("-1 week"));
  $bulan1 = date("Y-m-d", strtotime("-1 month"));
  $bulan3 = date("Y-m-d", strtotime("-3 months"));
  $tahun1 = date("Y-m-d", strtotime("-1 year"));
  $now = date("Y-m-d");

  if ($waktu == '1minggu') {
    $jangkaWaktu = "1 Minggu";
    $get = $koneksi->query("SELECT purchase_order.date as date_po, produk_log.date as date_log, perusahaan_nama,buyer,item_desc,qty,price,ongkir
      FROM purchase_order JOIN produk_log ON purchase_order.po_number=produk_log.log_code WHERE `status_log`='SELESAI' AND `jenis_surat`='INVOICE'
      AND purchase_order.date between '$minggu1' and '$now' GROUP BY log_code");
  } elseif ($waktu == '1bulan') {
    $jangkaWaktu = "1 Bulan";
    $get = $koneksi->query("SELECT purchase_order.date as date_po, produk_log.date as date_log, perusahaan_nama,buyer,item_desc,qty,price,ongkir
      FROM purchase_order JOIN produk_log ON purchase_order.po_number=produk_log.log_code WHERE `status_log`='SELESAI' AND `jenis_surat`='INVOICE'
      AND purchase_order.date between '$bulan1' and '$now' GROUP BY log_code");
  } elseif ($waktu == "3bulan") {
    $jangkaWaktu = "3 Bulan";
    $get = $koneksi->query("SELECT purchase_order.date as date_po, produk_log.date as date_log, perusahaan_nama,buyer,item_desc,qty,price,ongkir
      FROM purchase_order JOIN produk_log ON purchase_order.po_number=produk_log.log_code WHERE `status_log`='SELESAI' AND `jenis_surat`='INVOICE'
      AND purchase_order.date between '$bulan3' and '$now' GROUP BY log_code");
  } elseif ($waktu == '1tahun') {
    $jangkaWaktu = "1 Tahun";
    $get = $koneksi->query("SELECT purchase_order.date as date_po, produk_log.date as date_log, perusahaan_nama,buyer,item_desc,qty,price,ongkir
      FROM purchase_order JOIN produk_log ON purchase_order.po_number=produk_log.log_code WHERE `status_log`='SELESAI' AND `jenis_surat`='INVOICE'
      AND purchase_order.date between '$tahun1' and '$now' GROUP BY log_code");
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
    <img src="kopSurat.png" >
    <br>
    <p>Laporan Penjualan '.$jangkaWaktu.' terakhir</p>

    <table border="1" border-collapse: collapse; cellpadding="5" cellspacing="0" style="width: 100%;">
        <tr>
            <th style="background-color: #add8e6">No</th>
            <th style="background-color: #add8e6">Tanggal</th>
            <th style="background-color: #add8e6">Nama Perusahaan</th>
            <th style="background-color: #add8e6">Nama Pembeli</th>
            <th style="background-color: #add8e6">Pesanan</th>
            <th style="background-color: #add8e6">Jumlah</th>
            <th style="background-color: #add8e6">Harga Satuan</th>
            <th style="background-color: #add8e6">Harga Ongkir</th>
            <th style="background-color: #add8e6">Total Harga</th>
        </tr>
';


while ($data = $get->fetch_assoc()) :
  $hargappn = $data['price'] + ($data['price'] * 0.1);
  $totalharga = ($hargappn * $data['qty']) + $data['ongkir'];

    $html .= '<tr>
            <td> ' . $no . ' </td>
            <td> ' . $data['date_log'] . ' </td>
            <td> ' . $data['perusahaan_nama'] . '</td>
            <td> ' . $data['buyer'] . ' </td>
            <td> ' . $data['item_desc'] . ' </td>
            <td> ' . $data['qty'] . ' </td>
            <td> ' . number_format($hargappn) . ' </td>
            <td> ' . number_format($data['ongkir']) . ' </td>
            <td> ' . number_format($totalharga) . ' </td>
        </tr>
        ';
        $totalPenjualan = $totalPenjualan + $totalharga;
    $no++;
endwhile;

$html .= '
<tr>
  <td colspan="8">Total Penjualan</td>
  <td>'.number_format($totalPenjualan).'</td>
</tr>
</table>
<table style="float:right;text-align:right;width:100%;">
  <tr>
    <td><table style="text-align:center"><tr><td>

    Makassar, '. tanggal_indonesia($now) .'
    <br><br><br><br><br><br>
    ( Nama Sekertaris )
    </td></tr></table></td>
  </tr>

</table>
</body>
</html>';
$mpdf->WriteHTML("$html");
$mpdf->Output();
