<?php 
// koneksi ke database
$db_conn = mysqli_connect("localhost","root","","phpdasar");

// ambil data dari table mahasiswa / query
$result = mysqli_query($db_conn,"SELECT * FROM game_portfolio");

// ambil data (fetch) dari object result
// mysqli_fetch_row() // mengembalikan array numerik
// mysqli_fetch_assoc() // mengembalikan array associative
// mysqli_fetch_array() // mengembalikan dua duanya
// mysqli_fetch_object() // mengembalikan object

// while($game_portfolio = mysqli_fetch_assoc($result) ) {
//     var_dump($game_portfolio);
// }

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
        <?php $i=1;while($row = mysqli_fetch_assoc($result)) :?>
        <tr>
            <td><?= $i;?></td>
            <td>
                <button>Update</button>
                <button>Delete</button>
            </td>
            <td><img src="img/<?= $row["image"]?>" alt="<?= $row["image"]?>" width="200"></td>
            <td><?= $row["name"]?></td>
            <td><?= $row["project_type"]?></td>
            <td><?= $row["dev_time"]?></td>
            <td><?= $row["date_start"]?></td>
            <td><?= $row["date_finish"]?></td>
        </tr>
        <?php $i++;endwhile;?>
    </table>
</body>

</html>