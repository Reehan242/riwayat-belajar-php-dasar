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

?>