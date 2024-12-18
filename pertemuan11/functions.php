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
    $image = htmlspecialchars($data["image"]);

    // query insert data
    $query = "INSERT INTO game_portfolio 
    VALUES ('', '$name', '$project_type', '$tools', '$dev_time', '$date_start', '$date_finish', '$image')";

    mysqli_query($db_conn,$query);

    return mysqli_affected_rows($db_conn);
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
    $image = htmlspecialchars($data["image"]);

    // query insert data
    $query = "UPDATE game_portfolio SET name = '$name', tools = '$tools',
    dev_time = '$dev_time',date_start = '$date_start', date_finish = '$date_finish',
    image = '$image' WHERE id = $id ";

    mysqli_query($db_conn,$query);

    return mysqli_affected_rows($db_conn);
}



?>