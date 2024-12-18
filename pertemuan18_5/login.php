<?php
session_start();
require 'functions.php';

// cek cookie
if(isset($_COOKIE['key1']) && isset($_COOKIE['key2'])){
    $key1 = $_COOKIE['key1'];
    $key2 = $_COOKIE['key2'];

    // ambil username berdasarkan id
    $result = mysqli_query($db_conn,"SELECT username FROM users WHERE id=$key1");
    $row = mysqli_fetch_assoc($result);

    // cek cookie dan username
    if( $key2 === hash('tiger128,3',$row['username'])){
        $_SESSION['login'] = true;
    }
}

//cek session login nya  
if(isset($_SESSION['login'])){
    header("Location: index.php");
    exit;
}

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($db_conn, "SELECT * FROM users WHERE username = '$username'");

    // cek username
    if (mysqli_num_rows($result) === 1) {
        // cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            // set session
            $_SESSION["login"] = true;

            // cek remember me
            if(isset($_POST["remember"])){
                //buat cookie
                
                setcookie('key1',$row['id'],time()+120);
                setcookie('key2',hash('tiger128,3',$row['username']),time()+120);
            }

            header("Location: index.php");
            exit;
        }
    }

    $error = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
</head>

<body>
    <h1>Halaman Login</h1>

    <?php if (isset($error)): ?>
        <p style="color:red; font-style:italic; ">username / password salah</p>
    <?php endif; ?>
    <form action="" method="post">
        <ul>
            <li>
                <label for="username">Username</label>
                <input type="text" name="username" id="username">
            </li>
            <li>
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
            </li>
            <li>
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Remember me</label>
            </li>
            <li>
                <button type="submit" name="login">Login</button>
            </li>
        </ul>
    </form>
</body>

</html>