<?php

include "database/connection.php";

if (isset($_POST['insertMatkul'])) {
    $namaMatkul = mysqli_real_escape_string($connection, $_POST['namaMatkul']);
    $sks = mysqli_real_escape_string($connection, $_POST['sks']);
    $insertMatkulQuery = "INSERT INTO tabel_matakuliah (nama_matakuliah, sks) VALUES ('$namaMatkul', '$sks')";
    $resultInsertMatkulQuery = mysqli_query($connection, $insertMatkulQuery);
    if ($resultInsertMatkulQuery == true) {
        header('location:tabel_matakuliah.php');
        exit;
    }
}

if (isset($_POST['updateMatkul'])) {
    $kodeMatkul = mysqli_real_escape_string($connection, $_POST['kodeMatkul']);
    $namaMatkul = mysqli_real_escape_string($connection, $_POST['namaMatkul']);
    $sks = mysqli_real_escape_string($connection, $_POST['sks']);

    $updateMatkulQuery = "UPDATE tabel_matakuliah SET nama_matakuliah = '$namaMatkul', sks = '$sks' WHERE kode_matakuliah = '$kodeMatkul'";
    $resultUpdateMatkulQuery = mysqli_query($connection, $updateMatkulQuery);
    if ($resultUpdateMatkulQuery == true) {
        header('location:tabel_matakuliah.php');
        exit;
    }
}

if (isset($_POST['deleteMatkul'])) {
    $kodeMatkul = mysqli_real_escape_string($connection, $_POST['kodeMatkul']);
    $deleteMatkulQuery = "DELETE FROM tabel_matakuliah WHERE kode_matakuliah = '$kodeMatkul'";
    $resultDeleteMatkulQuery = mysqli_query($connection, $deleteMatkulQuery);
    if ($resultDeleteMatkulQuery == true) {
        header('location:tabel_matakuliah.php');
        exit;
    }
}
