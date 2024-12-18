<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POST</title>
</head>

<body>
    <form method="post">
        Masukkan nama :
        <input type="text" name="nama">
        <br>
        <button type="submit" name="submit">Kirim!</button>
        <br>
        <?php if (isset($_POST["submit"])) : ?>
            <h1>selamat datang, <?= $_POST["nama"] ?></h1>
        <?php endif; ?>
    </form>
</body>

</html>