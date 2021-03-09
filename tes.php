<?php

function rp_terbilang($angka,$debug)
{
   
    $angka = str_replace(".",",",$angka);
   
    list ($angka, $desimal) = explode(",",$angka);
    $panjang=strlen($angka);
    for ($b=0;$b<$panjang;$b++)
    {
        $myindex=$panjang-$b-1;
        $a_bil[$b]=substr($angka,$myindex,1);
    }
    if ($panjang>9)
    {
        $bil=$a_bil[9];
        if ($panjang>10)
        {
            $bil=$a_bil[10].$bil;
        }

        if ($panjang>11)
        {
            $bil=$a_bil[11].$bil;
        }
        if ($bil!="" && $bil!="000")
        {
            $terbilang .= rp_satuan($bil,$debug)." milyar";
        }
       
    }

    if ($panjang>6)
    {
        $bil=$a_bil[6];
        if ($panjang>7)
        {
            $bil=$a_bil[7].$bil;
        }

        if ($panjang>8)
        {
            $bil=$a_bil[8].$bil;
        }
        if ($bil!="" && $bil!="000")
        {
            $terbilang .= rp_satuan($bil,$debug)." juta";
        }
       
    }
   
    if ($panjang>3)
    {
        $bil=$a_bil[3];
        if ($panjang>4)
        {
            $bil=$a_bil[4].$bil;
        }

        if ($panjang>5)
        {
            $bil=$a_bil[5].$bil;
        }
        if ($bil!="" && $bil!="000")
        {
            $terbilang .= rp_satuan($bil,$debug)." ribu";
        }
       
    }

    $bil=$a_bil[0];
    if ($panjang>1)
    {
        $bil=$a_bil[1].$bil;
    }

    if ($panjang>2)
    {
        $bil=$a_bil[2].$bil;
    }
    //die($bil);
    if ($bil!="" && $bil!="000")
    {
        $terbilang .= rp_satuan($bil,$debug);
    }
    return trim($terbilang);
}

echo "rp_terbilang(1000)";

?>