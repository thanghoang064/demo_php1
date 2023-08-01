<?php

//$manglienhop = ["mau_do"=>"red","mau_den"=>"black"];
//$mangmoi = array_values($manglienhop);

//echo "<pre>";
//echo print_r($mangmoi);
//echo array_pop($manglienhop);
$mangbt = [1,2,3,4,5,6,7,8];
$mangnew  = [17,29,13,35,6,26];
function ktraNguyenTo($n) {
    $flag = true;
    if ($n < 2) {
        $flag = false;
    } else {
        for ($i = 2;$i< $n;$i ++) {
            if ($n % $i ==0) {
                $flag = false;
            }
        }
    }
    return $flag;
}
foreach ($mangnew as $key=>$value) {
    if (ktraNguyenTo($value) == true) {
        array_push($mangbt,$value);
    }
}
echo "<pre>";
echo print_r($mangbt);
// nhặt những phần tử là số nguyên tố trong mangnew thêm vào mảng bt
// nhặt những phần tử mangbt là số chẵn  thêm vào mangnew
//echo "Trước khi thêm ";
//echo "<pre>";
//echo print_r($mangbt);
//array_push($mangbt,9);
//echo "sau khi thêm";
//echo "<pre>";
//echo print_r($mangbt);
?>

