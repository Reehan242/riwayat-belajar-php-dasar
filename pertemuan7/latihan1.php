<?php
// Variable scope / lingkup scope
// $x = 10; //jika ingin diakses pada function, harus pake global
// function printX(){
//     global $x;
//     echo $x;
// }
// printX();

// var superglobal (variabel global milik PHP dan merupakan array associative)
// var_dump($_SERVER);

//$_GET
// var_dump($_GET);
//$_GET bisa diisi melalui URL , dengan cara tambahkan ?key=value contoh ?nama=raihan

$game_portfolio = [
    [
        "name" => "Brick Crusher",
        "project_type" => "Solo Project",
        "tools" => "Game Maker Studio 2",
        "waktu" =>  "2 Weeks",
        "date_start" => "24 November 2022",
        "date_finish" => "12 December 2022",
        "image" => "brick_crusher.png"
    ],
    [
        "name" => "The Only Hero!",
        "project_type" => "Solo Project",
        "tools" => "Godot Engine 3.5",
        "waktu" =>  "3 Months",
        "date_start" => "4 April 2023",
        "date_finish" => "11 July 2023",
        "image" => "the_only_hero.png"
    ],
    [
        "name" => "Virtual Pinball",
        "project_type" => "Solo Project",
        "tools" => "Unity",
        "waktu" =>  "1 Week",
        "date_start" => "22 August 2023",
        "date_finish" => "27 August 2023",
        "image" => "virtual_pinball.png"
    ],
    [
        "name" => "Guild Rush",
        "project_type" => "Team Project",
        "tools" => "Unity",
        "waktu" =>  "3 Months 3 Weeks",
        "date_start" => "5 September 2023",
        "date_finish" => "26 December 2023",
        "image" => "guild_rush.png"
    ],
    [
        "name" => "Kisah Monster",
        "project_type" => "Solo Project",
        "tools" => "Unity",
        "waktu" =>  "3 Months",
        "date_start" => "1 May 2024",
        "date_finish" => "28 July 2024",
        "image" => "kisah_monster.png"
    ]
]
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Portfolio</title>
</head>

<body>
    <h1>Daftar Porfolio Game</h1>
    <?php foreach ($game_portfolio as $each_data): ?>
        <h2><a href="latihan2.php?name=<?=$each_data["name"];?>&
        project_type=<?=$each_data["project_type"];?>&
        tools=<?=$each_data["tools"];?>&
        waktu=<?=$each_data["waktu"];?>&
        date_start=<?=$each_data["date_start"];?>&
        date_finish=<?=$each_data["date_finish"];?>&
        image=<?=$each_data["image"];?>&">Name : <?= $each_data["name"]; ?></a></h2>
    <?php endforeach; ?>

</body>

</html>