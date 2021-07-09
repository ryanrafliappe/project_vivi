<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
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
    <td colspan="7">Total Penjualan</td>
    <td >Rp. '.number_format($totalPenjualan).'</td>
    </tr>
    <tr style="border-top:1 solid;">
    <td colspan="2">Terbilang</td>
    <td colspan="8">'.$terbilang.'</td>
    </tr>
    </table>

    </table>

  </body>
</html>
