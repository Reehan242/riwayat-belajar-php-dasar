<?php 
// koneksi ke database
$db_conn = mysqli_connect("localhost","root","","phpdasar");

function query($query) {
    global $db_conn;
    $result = mysqli_query($db_conn, $query);
    if(!$result){
        echo "Query Error" . mysqli_error($db_conn);
    }
    $rows = [];
    while($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


function insert($data) {
    global $db_conn;

    $name = htmlspecialchars($data["name"]);
    $project_type = htmlspecialchars($data["project_type"]);
    $tools = htmlspecialchars($data["tools"]);
    $dev_time = htmlspecialchars($data["dev_time"]);
    $date_start = htmlspecialchars($data["date_start"]);
    $date_finish = htmlspecialchars($data["date_finish"]);
    
    // upload gambar
    $image = upload();
    if(!$image) {
        return false;
    }
    // query insert data
    $query = "INSERT INTO game_portfolio 
    VALUES ('', '$name', '$project_type', '$tools', '$dev_time', '$date_start', '$date_finish', '$image')";

    mysqli_query($db_conn,$query);

    return mysqli_affected_rows($db_conn);
} 

function upload(){
    $namaFile = $_FILES['image']['name'];
    $ukuranFile = $_FILES['image']['size'];
    $error = $_FILES['image']['error'];
    $tmpName = $_FILES['image']['tmp_name'];

    // cek apakah tidak ada gambar yang diupload
    if($error === 4) {
        echo "<script> alert('pilih gambar terlebih dahulu!');</script>";
        return false;
    }

    // cek yang diupload gambar atau bukan
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png','gif'];
    $ekstensiGambar = explode('.',$namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if( !in_array($ekstensiGambar,$ekstensiGambarValid)){
        echo "<script> alert('yang anda upload bukan gambar!');</script>";
        return false;
    } 

    // cek jika ukuran gambar terlalu besar
    if ($ukuranFile > 1000000) {
        echo "<script> alert('ukuran gambar terlalu besar!');</script>";
        return false;
    }

    // lolo pengecekan, gambar siap diupload
    // generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    
    move_uploaded_file($tmpName,'img/'. $namaFileBaru);
    return $namaFileBaru;
}

function delete($id){
    global $db_conn;

    // query deid
    mysqli_query($db_conn, "DELETE FROM game_portfolio WHERE id=$id");

    return mysqli_affected_rows($db_conn);
}
function getTotalData($keyword = '') {
    if ($keyword) {
        return count(search($keyword));
    }
    return count(query("SELECT * FROM game_portfolio"));
}

function getGamePortfolioData($keyword = '', $awalData, $jumlahDataPerHalaman) {
    if ($keyword) {
        return paginationForSearch($keyword, $awalData, $jumlahDataPerHalaman);
    }
    return query("SELECT * FROM game_portfolio LIMIT $awalData, $jumlahDataPerHalaman");
}

function update($data) {
    global $db_conn;

    $id = $data["id"];
    $name = htmlspecialchars($data["name"]);
    $project_type = htmlspecialchars($data["project_type"]);
    $tools = htmlspecialchars($data["tools"]);
    $dev_time = htmlspecialchars($data["dev_time"]);
    $date_start = htmlspecialchars($data["date_start"]);
    $date_finish = htmlspecialchars($data["date_finish"]);
    $oldImage = htmlspecialchars($data["oldImage"]);

    // cek apakah user pilih gambar baru atau tidak
    if ($_FILES['image']['error'] === 4) {
        $image = $oldImage;
    } else {
        $image = upload();
    }

    // query insert data
    $query = "UPDATE game_portfolio SET name = '$name',project_type = '$project_type' ,tools = '$tools',
    dev_time = '$dev_time',date_start = '$date_start', date_finish = '$date_finish',
    image = '$image' WHERE id = $id ";

    mysqli_query($db_conn,$query);

    return mysqli_affected_rows($db_conn);
}

function search($keyword) {
    $query = "SELECT * FROM game_portfolio WHERE name LIKE '%$keyword%'OR 
    project_type LIKE '%$keyword%' OR
    tools LIKE '%$keyword%' OR
    dev_time LIKE '%$keyword%' OR
    date_start LIKE '%$keyword%' OR
    date_finish LIKE '%$keyword%'";

    return query($query);
}
function paginationForSearch($keyword,$awalData,$jumlahDataPerHalaman) {
    $query = "SELECT * FROM game_portfolio WHERE name LIKE '%$keyword%'OR 
    project_type LIKE '%$keyword%' OR
    tools LIKE '%$keyword%' OR
    dev_time LIKE '%$keyword%' OR
    date_start LIKE '%$keyword%' OR
    date_finish LIKE '%$keyword%' LIMIT $awalData,$jumlahDataPerHalaman ";

    return query($query);
}
function register($data) {
    global $db_conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($db_conn, $data["password"]);
    $password2 = mysqli_real_escape_string($db_conn, $data["password2"]);
    $email = strtolower($data["email"]);
    
    //cek username sudah ada atau belum
    $result = mysqli_query($db_conn, "SELECT username FROM users WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)){
        echo "<script> alert('username sudah terdaftar!');</script>";
        return false;
    }
    // cek konfirmasi password
    if($password !== $password2) {
        echo "<script>alert('password doesnt match')</script>";
    }

    // enkripsi password pake algoritma default yang terus di update oleh php
    $password = password_hash($password, PASSWORD_DEFAULT);
    
    //tambahkan data user ke database
    mysqli_query($db_conn,"INSERT INTO users VALUES ('', '$username', '$password','$email')");

    return mysqli_affected_rows($db_conn);    
}


?>