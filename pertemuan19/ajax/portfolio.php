<?php
session_start();
require '../functions.php';

// $jumlahDataPerHalaman = 3;
// if (isset($_SESSION['searching'])) {
//     // pagination saat searching
//     $keyword = $_SESSION['searching'];
//     $jumlahData = count(search($keyword));
//     $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
//     // ternary operator cek get nya ada atau gak
//     $halamanAktif = (isset($_GET['page'])) ? $_GET['page'] : 1;
//     // hitung index awal data untuk tiap halaman
//     $awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;
//     $game_portfolio = paginationForSearch(
//         $keyword,
//         $awalData,
//         $jumlahDataPerHalaman
//     );
// } else {
//     // pagination tanpa searching
//     $jumlahData = count(query("SELECT * FROM game_portfolio"));
//     $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
//     // ternary operator cek get nya ada atau gak
//     $halamanAktif = (isset($_GET['page'])) ? $_GET['page'] : 1;
//     // hitung index awal data untuk tiap halaman
//     $awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;
//     $game_portfolio = query("SELECT * FROM game_portfolio LIMIT $awalData,$jumlahDataPerHalaman");
// }
$keyword = $_GET['keyword'] ?? '';
$_SESSION['searching'] = $keyword;

$jumlahDataPerHalaman = 3;
$jumlahData = getTotalData($keyword);
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = (isset($_GET['page'])) ? $_GET['page'] : 1;
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;
$game_portfolio = getGamePortfolioData($keyword, $awalData, $jumlahDataPerHalaman);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- navigasi -->
    <?php if ($halamanAktif > 1) : ?>
        <a href="?page=<?= $halamanAktif - 1; ?>">&laquo;</a>
    <?php endif; ?>
    <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
        <?php if ($i == $halamanAktif): ?>
            <a href="?page=<?= $i; ?>" style="font-weight: bold; color: red;"><?= $i; ?></a>
        <?php else : ?>
            <a href="?page=<?= $i; ?>"><?= $i; ?></a>
        <?php endif; ?>
    <?php endfor; ?>
    <?php if ($halamanAktif < $jumlahHalaman) : ?>
        <a href="?page=<?= $halamanAktif + 1; ?>">&raquo;</a>
    <?php endif; ?>
    <br>

    <!-- Display Data -->
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>Thumbnail</th>
            <th>Project Title</th>
            <th>Project Type</th>
            <th>Tools</th>
            <th>Development Time</th>
            <th>Date Start</th>
            <th>Date Finish</th>
        </tr>
        <?php $i = 1;
        foreach ($game_portfolio as $row) : ?>
            <tr>
                <td><?= $i + $awalData; ?></td>
                <td>
                    <a href="update.php?id=<?= $row["id"] ?>"><button>Update</button></a>
                    <a href="delete.php?id=<?= $row["id"] ?>" onclick="return confirm('Sure U want to delete?');"><button>Delete</button></a>
                </td>
                <td><img src="img/<?= $row["image"] ?>" alt="<?= $row["image"] ?>" width="200"></td>
                <td><?= $row["name"] ?></td>
                <td><?= $row["project_type"] ?></td>
                <td><?= $row["tools"] ?></td>
                <td><?= $row["dev_time"] ?></td>
                <td><?= $row["date_start"] ?></td>
                <td><?= $row["date_finish"] ?></td>
            </tr>
        <?php $i++;
        endforeach; ?>
    </table>
</body>

</html>