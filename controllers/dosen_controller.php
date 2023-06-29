<?php

include "database/connection.php";

if (isset($_POST['insertDosen'])) {
    $namaDosen = mysqli_real_escape_string($connection, $_POST['namaDosen']);
    $jenisKelamin = mysqli_real_escape_string($connection, $_POST['jenisKelamin']);
    $alamat = mysqli_real_escape_string($connection, $_POST['alamat']);
    $telepon = mysqli_real_escape_string($connection, $_POST['telepon']);

    $insertDosenQuery = "INSERT INTO tabel_dosen (nama_dosen, jenis_kelamin, alamat, telepon) VALUES ('$namaDosen', '$jenisKelamin', '$alamat', '$telepon')";
    $resultInsertDosenQuery = mysqli_query($connection, $insertDosenQuery);
    if ($resultInsertDosenQuery == true) {
        header('location:tabel_dosen.php');
        exit;
    }
}

if (isset($_POST['updateDosen'])) {
    $kodeDosen = mysqli_real_escape_string($connection, $_POST['kodeDosen']);
    $namaDosen = mysqli_real_escape_string($connection, $_POST['namaDosen']);
    $jenisKelamin = mysqli_real_escape_string($connection, $_POST['jenisKelamin']);
    $alamat = mysqli_real_escape_string($connection, $_POST['alamat']);
    $telepon = mysqli_real_escape_string($connection, $_POST['telepon']);

    $updateDosenQuery = "UPDATE tabel_dosen SET nama_dosen = '$namaDosen', jenis_kelamin = '$jenisKelamin', alamat = '$alamat', telepon = '$telepon' WHERE kode_dosen = '$kodeDosen'";
    $resultUpdateDosenQuery = mysqli_query($connection, $updateDosenQuery);
    if ($resultUpdateDosenQuery == true) {
        header('location:tabel_dosen.php');
        exit;
    }
}

if (isset($_POST['deleteDosen'])) {
    $kodeDosen = mysqli_real_escape_string($connection, $_POST['kodeDosen']);
    $deleteDosenQuery = "DELETE FROM tabel_dosen WHERE kode_dosen = '$kodeDosen'";
    $resultDeleteDosenQuery = mysqli_query($connection, $deleteDosenQuery);
    if ($resultDeleteDosenQuery == true) {
        header('location:tabel_dosen.php');
        exit;
    }
}
