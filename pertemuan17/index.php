<?php 
session_start();

//cek session login nya  
if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit;
}
require 'functions.php';
$game_portfolio = query("SELECT * FROM game_portfolio");

// tombol cari ditekan
if (isset($_POST["search"])) {
    $game_portfolio = search($_POST["keyword"]);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
</head>

<body>
    <a href="logout.php">Logout</a>
    <h1>Daftar Portfolio</h1>

    <a href="insert.php">Tambah Data Portfolio</a>
    <br><br>
    
    <form action="" method="post">
        <input type="text" name="keyword" size="40" autofocus placeholder="masukkan keyword pencarian" autocomplete="off">
        <button type="submit" name="search" >Search</button>
    </form>
    <br>
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