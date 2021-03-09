<?php

require_once '../../assets/vendor/mpdf/autoload.php';
include '../../conf/koneksi.php';

$mpdf = new \Mpdf\Mpdf([
    'orientation' => 'P'
]);

$datas = $koneksi->query("SELECT * FROM `purchase_order` WHERE po_number = '" . $_GET['logcode'] . "'");
$data = $datas->fetch_assoc();

$idx = $_GET['id'];

$harga = $_GET['hargas'];
$terbilang = $_GET['terbilangs'];
$sql = $koneksi->query("SELECT * FROM produk_log WHERE log_code = '" . $_GET['logcode'] . "'");
$query = $sql->fetch_assoc();

$idx = $_GET['id'];
$item_descs = $koneksi->query("SELECT * FROM produk WHERE id = '" . $data['id_produk'] . "'");
$item_desc = $item_descs->fetch_assoc();


function getRomawi($bln)
{
    switch ($bln) {
        case 1:
            return "I";
            break;
        case 2:
            return "II";
            break;
        case 3:
            return "III";
            break;
        case 4:
            return "IV";
            break;
        case 5:
            return "V";
            break;
        case 6:
            return "VI";
            break;
        case 7:
            return "VII";
            break;
        case 8:
            return "VIII";
            break;
        case 9:
            return "IX";
            break;
        case 10:
            return "X";
            break;
        case 11:
            return "XI";
            break;
        case 12:
            return "XII";
            break;
    }
}

$bulan	= date('n');
$romawi = getRomawi($bulan);

$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="" style="text-align: right">Makassar, '. date('d F Y') .'</div>
    <p>
    <div class="">No&emsp;&emsp;&emsp;: ' . $idx . '/LDJ-MKS/' . $romawi . '/' . date('Y') . '</div>
    <div class="">Lamp&emsp;&nbsp; : - </div>
    <div class="">Hal&emsp;&nbsp;&emsp;&nbsp;: <u>Permintaan Pembayaran</u></div>
    </p>
    <br><br>
    <div class="">Kepada Yth, </div>
    <div class="">' . $query['nama_perusahaan'] . '</div>
    <div class="">' . $query['alamat_perusahaan'] . '</div><br>
    <div class="">di,- </div>
    <div class=""><u><b>' . $query['kota'] . '</b></u></div>
    <br><br>

    <div class="">Dengan Hormat, </div><br>
    <div class="">Sehubungan dengan PO No. '. $query['log_code'] .' Tgl. '. $query['date'] .' perihal pengadaan ' . $item_desc['item_desc'] . ' 
    ' . $item_desc['spesifikasi'] . ' yang telah kami selesaikan, maka bersama ini memohon pembayaran sebesar :  <br><br>
    Rp. ' . number_format($harga) . ',- / Unit</div>

    <div class="">Terbilang : ' . $terbilang . '</div>
    <div class="">Pembayaran tersebut mohon ditransfer ke :</div>
    <div class=""><b>Bank Mandiri</b> dengan nomor Rekening 152.00.371971.22 atas nama CV. PT. ANUGERAH TEHNIK MANDIRI</div>

    <div class="">Demikian permohonan permintaan pembayaran ini kami buat, atas perhatian dan kerjasamanya diucapkan terima kasih</div>
    <br>

    <pre style="font-family: times new roman; font-size: 14px;font-weight: bold;">

        Hormat Kami,
        PT. ANUGERAH TEHNIK MANDIRI



        <u>Ivan Ladjalani</u>
                Direktur
    </pre>

';

$html .= '</body>
</html>';
$mpdf->WriteHTML("$html");
$mpdf->Output();
