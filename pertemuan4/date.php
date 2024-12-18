<?php
//Date nampilin tanggal sesuai format parameter nya 
// echo (date("l, d-M-Y"));

//UNIX Timestamp / Epoch time 
// detik yang sudah berlalu sejak 1 januari 1970

// echo date("l, d M y",time()+3600*24*1);

// mktime
// membuat sendiri detik
// mktime(0,0,0,0,0,0)
// jam, menit, detik, bulan, tanggal, tahun
mktime(0,0,0,4,1,2002);

echo date("l,d M y", mktime(0,0,0,4,1,2002));

//strtotime
?>