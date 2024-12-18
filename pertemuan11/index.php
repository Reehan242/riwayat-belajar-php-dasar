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

    <a href="insert.php">Tambah Data Portfolio</a>
    <br><br>
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
        <?php $i=1;foreach( $game_portfolio as $row) :?>
        <tr>
            <td><?= $i;?></td>
            <td>
                <a href="update.php?id=<?= $row["id"]?>"><button>Update</button></a>
                <a href="delete.php?id=<?= $row["id"]?>" onclick="return confirm('Sure U want to delete?');"><button>Delete</button></a>
            </td>
            <td><img src="img/<?= $row["image"]?>" alt="<?= $row["image"]?>" width="200"></td>
            <td><?= $row["name"]?></td>
            <td><?= $row["project_type"]?></td>
            <td><?= $row["dev_time"]?></td>
            <td><?= $row["date_start"]?></td>
            <td><?= $row["date_finish"]?></td>
        </tr>
        <?php $i++;endforeach;?>
    </table>
</body>

</html>