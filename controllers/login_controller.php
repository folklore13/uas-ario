<?php

session_start();

include "../database/connection.php";

$username = mysqli_real_escape_string($connection, $_POST['username']);
$password = mysqli_real_escape_string($connection, $_POST['password']);

if (isset($_POST['submit'])) {
    $getPasswordQuery = "SELECT password FROM tabel_user WHERE username = '" . $username . "'";
    $getPasswordQueryResult = mysqli_query($connection, $getPasswordQuery);
    $hashedPassword = mysqli_fetch_array($getPasswordQueryResult);
    if (password_verify($password, $hashedPassword[0])) {
        $_SESSION['login'] = true;
        $_SESSION['username'] = $username;
        header('location:../index.php');
    } else {
        header('location:../login.php');
        exit;
    }
}
