<?php
// array
// variabel yang dapat memiliki banyak nilai
// elemen array pada php boleh memiliki tipe yang berbeda

//membuat array
$hari = array("senin","selasa","rabu","kamis","jumat","sabtu","minggu");

$bulan = ["Januari","Februari","Maret"];

// var_dump($hari);
// echo "<br>";
// print_r($bulan);

// // Menampilkan 1 elemen pada array
// echo "<br>";
// echo $hari[0];
var_dump($hari);
$hari[] = "Ahad";
?>