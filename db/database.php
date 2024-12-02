<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database_name = "tetrajasa";

$db = mysqli_connect($hostname, $username, $password, $database_name);

if(!$db) {
    die("Failed to connect: " . mysqli_connect_error());
    
};

function updateNomorUrut($db) {
    $result = mysqli_query($db, "SELECT id FROM data_client ORDER BY id ASC");
    $nomor = 1;

    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        mysqli_query($db, "UPDATE data_client SET nomor_urut = $nomor WHERE id = $id");
        $nomor++;
    }
}

// $username = "admin";
// $password = "admin";
// $password_hash = hash('sha256', $password);
// $sql = "INSERT INTO admin (username, password) VALUES ('$username', '$password_hash')";

// $db->query($sql)
?>