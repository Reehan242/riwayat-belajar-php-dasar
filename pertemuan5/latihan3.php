<?php
$mahasiswa = [
    ["Raihan", "51420043", "Informatika", "Hammam@gmail.com"],
    ["Agnes", "14151525", "Sistem Informasi", "Safira@gmail.com"],
    ["Hamdan", "32145115", "Gorego", "mamam@gmail.com"]

];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
    <style>

    </style>
</head>

<body>
    <h1> Daftar Mahasiswa</h1>


    <?php foreach ($mahasiswa as $mhs) : ?>
        <ul>
            <li>Nama : <?= $mhs[0]; ?></li>
            <li>NPM : <?= $mhs[1]; ?></li>
            <li>Jurusan : <?= $mhs[2]; ?></li>
            <li>Email : <?= $mhs[3]; ?></li>
        </ul>
    <?php endforeach; ?>
</body>

</html>