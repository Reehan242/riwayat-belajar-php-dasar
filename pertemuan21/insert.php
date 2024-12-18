<?php 
session_start();

//cek session login nya  
if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit;
}

require 'functions.php';

// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"])) {


    // cek apakah data berhasil di tambahkan atau tidak
    if (insert($_POST) > 0) {
        echo "<script>
                alert('data berhasil ditambahkan!');
                document.location.href = 'index.php';
            </script>";
    } else {
        echo "<script>
                alert('data gagal ditambahkan!');
                document.location.href = 'index.php';
            </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Portfolio Data</title>
</head>

<body>
    <h1>Insert Portfolio Data</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="name">Project Name</label>
                <input type="text" name="name" id="name" required>
            </li>
            <li>
                <label for="project_type">Project type</label>
                <input type="text" name="project_type" required>
            </li>
            <li>
                <label for="tools">Development Tools</label>
                <input type="text" name="tools" id="tools" required>
            </li>
            <li>
                <label for="dev_time">Development Time</label>
                <input type="text" name="dev_time" id="dev_time" required>
            </li>
            <li>
                <label for="date_start">Date Start</label>
                <input type="date" name="date_start" id="date_start" value="<?= date('Y-m-d')?>">
            </li>
            <li>
                <label for="date_finish">Date Finish</label>
                <input type="date" name="date_finish" id="date_finish" value="<?= date('Y-m-d')?>">
            </li>
            <li>
                <label for="image">Thumbnail</label>
                <input type="file" name="image" id="image">
            </li>
            <button type="submit" name="submit">Insert Data</button>
        </ul>
    </form>
</body>

</html>