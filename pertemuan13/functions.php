<?php 
// koneksi ke database
$db_conn = mysqli_connect("localhost","root","","phpdasar");

function query($query) {
    global $db_conn;
    $result = mysqli_query($db_conn, $query);
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

function delete(string $id){
    global $db_conn;

    // query deid
    mysqli_query($db_conn, "DELETE FROM game_portfolio WHERE id=$id");

    return mysqli_affected_rows($db_conn);
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



?>