<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan Function</title>
</head>
<body>
    <h1><?php echo salam("raihan");?></h1>
</body>
</html>

<?php
function salam($waktu ="datang",$nama = "admin"){
    return "Selamat $waktu, $nama!";
}
?>