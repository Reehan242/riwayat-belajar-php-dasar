<?php 
// cek apakah tidak ada data di $_GET
if( !isset($_GET["nama"])||
    !isset($_GET["project_type"])||
    !isset($_GET["waktu"])||
    !isset($_GET["tools"])||
    !isset($_GET["date_start"])||
    !isset($_GET["date_finish"])||
    !isset($_GET["image"])) {
    // redirect
    header("Location: latihan1.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan 2</title>
</head>

<body>
    <h1>ini nampilin detail</h1>
    <img
        src="img/<?php echo $_GET["image"] ?>"
        class="img-thumbnail"
        alt="gambar game portfolio" />
    <p>
        Name : <?= $_GET["name"]; ?> <br>
        Project Type :<?= $_GET["project_type"];; ?> <br>
        Development Tools :<?= $_GET["tools"]; ?> <br>
        Development Time :<?= $_GET["waktu"]; ?> <br>
        Date Start :<?= $_GET["date_start"]; ?> <br>
        Date Finish :<?= $_GET["date_finish"]; ?>
    </p>
    <a href="latihan1.php">Back To Home</a>
</body>

</html>