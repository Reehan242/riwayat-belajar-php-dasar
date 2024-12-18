<?php
// $mahasiswa = [
//     ["Raihan", "51420043", "hammam@gmail.com", "informatika"],
//     ["jagung", "51420043", "hammam@gmail.com", "informatika"],
//     ["nirwana", "51420043", "hammam@gmail.com", "informatika"]
// ];

// Array Associative
$mahasiswa = [
    [
        "nama" => "Raihan", 
        "npm" => "51420043", 
        "email" => "hammam@gmail.com", 
        "jurusan" => "informatika",
        "Gambar" => "ujang.png"
    ],
    [
        "nama" => "Scara", 
        "npm" => "514201513", 
        "email" => "Scara@gmail.com", 
        "jurusan" => "informatika",
        "Gambar" => "who.png"
    ]
    
    
];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan 2</title>
    <style>
        .kotak {
            width: auto;
            height: 50px;
            background-color: salmon;
            text-align: center;
            line-height: 50px;
            margin: 3px;
            float: left;
            transition: 1s;
        }

        .kotak:hover {
            transform: rotate(360deg);

        }

        .clear {
            clear: both;
        }
    </style>
</head>

<body>
    <h1>Daftar Mahasiswa</h1>

    <?php foreach ($mahasiswa as $mhs): ?>
        <ul>
            <li>
                <img src="img/<?php echo $mhs['Gambar'];?>"/>
            </li>
            <li>Nama :<?= $mhs["nama"]; ?></li>
            <li>NPM :<?= $mhs["jurusan"]; ?></li>
            <li>Email :<?= $mhs["npm"]; ?></li>
            <li>Jurusan :<?= $mhs["email"]; ?></li>
        </ul>
    <?php endforeach; ?>

</body>

</html>