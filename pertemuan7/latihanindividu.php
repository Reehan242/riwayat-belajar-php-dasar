<?php
// Tanggal awal dan akhir
$tanggal1 = new DateTime("2023-02-21");
$tanggal2 = new DateTime("2024-01-29");

// Menghitung selisih
$selisih = $tanggal1->diff($tanggal2);

// Menampilkan hasil
echo ("Selisih waktu: $selisih->m bulan $selisih->d hari.");
?>
