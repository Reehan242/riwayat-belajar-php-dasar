<?php 
require 'functions.php';
$game_portfolio = query("SELECT * FROM game_portfolio");


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
</head>

<body>
    <h1>Daftar Portfolio</h1>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>Thumbnail</th>
            <th>Project Title</th>
            <th>Project Type</th>
            <th>Development Time</th>
            <th>Date Start</th>
            <th>Date Finish</th>
        </tr>
        <?php $i=1;foreach( $game_portfolio as $portfolio) :?>
        <tr>
            <td><?= $i;?></td>
            <td>
                <button>Update</button>
                <button>Delete</button>
            </td>
            <td><img src="img/<?= $portfolio["image"]?>" alt="<?= $portfolio["image"]?>" width="200"></td>
            <td><?= $portfolio["name"]?></td>
            <td><?= $portfolio["project_type"]?></td>
            <td><?= $portfolio["dev_time"]?></td>
            <td><?= $portfolio["date_start"]?></td>
            <td><?= $portfolio["date_finish"]?></td>
        </tr>
        <?php $i++;endforeach;?>
    </table>
</body>

</html>