<?php

include "../database/connection.php";

$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);

if (isset($_POST['register'])) {
    $insertQuery = "INSERT INTO tabel_user (username, password) values ('$username', '$password')";
    $checkQuery = mysqli_query($connection, $insertQuery);
    if ($checkQuery) {
        header("location:login.php");
        exit;
    } else {
        echo "There's an error on the server side.";
    }
}
