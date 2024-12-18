<?php
session_start();

//cek session login nya  
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
require 'functions.php';
$jumlahDataPerHalaman = 3;

$jumlahDataPerHalaman = 3;
$keyword = $_SESSION['searching'] ?? '';
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
    <title>Halaman Admin</title>
    <style>
        .loader {
            width: 100px;
            position: absolute;
            top: 120px;
            z-index: -1;
            display: none;

        }

        @media print {
            .toHide {
                display: none;
            }
        }
    </style>

</head>

<body>
    <a href="logout.php" class="toHide">Logout</a>
    <a href="cetak.php" target="_blank">Cetak</a>
    <h1>Daftar Portfolio</h1>

    <a href="insert.php" class="toHide">Tambah Data Portfolio</a>
    <br><br>
    <!-- form search bar -->
    <form action="" method="post" class="toHide">
        <input type="text" name="keyword" id="keyword" size="40" autofocus placeholder="masukkan keyword pencarian" autocomplete="off">
        <img src="img/Loading_icon.gif" class="loader">
    </form>

    <div id="container">
        <!-- navigasi -->
        <div class="toHide">
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
        </div>


        <!-- Display Data -->
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>No.</th>
                <th class="toHide">Aksi</th>
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
                    <td class="toHide">
                        <a href="update.php?id=<?= $row["id"] ?>"><button>Update</button></a>
                        <a href="delete.php?id=<?= $row["id"] ?>" onclick="return confirm('Sure U want to delete?');"><button>Delete</button></a>
                    </td>
                    <td><img src="img/<?= $row["image"] ?>" alt="<?= $row["image"] ?>" width="180" height="120"></td>
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
    </div>
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>