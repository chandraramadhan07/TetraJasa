<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
    exit;
}

include_once("../db/database.php");

$id = $_GET['id'];

$result = mysqli_query($db, "DELETE FROM data_client WHERE id=$id");
updateNomorUrut($db);

header("Location:manage_data.php");
?>