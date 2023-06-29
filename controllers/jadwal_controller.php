<?php

include "database/connection.php";

if (isset($_POST['insertJadwal'])) {
    $kodeMatkul = mysqli_real_escape_string($connection, $_POST['kodeMatkul']);
    $kodeDosen = mysqli_real_escape_string($connection, $_POST['kodeDosen']);
    $hari = mysqli_real_escape_string($connection, $_POST['hari']);
    $jam = mysqli_real_escape_string($connection, $_POST['jam']);

    $insertJadwalQuery = "INSERT INTO tabel_jadwal (kode_matakuliah, kode_dosen, hari, jam) VALUES ('$kodeMatkul', '$kodeDosen', '$hari', '$jam')";
    $resultInsertJadwalQuery = mysqli_query($connection, $insertJadwalQuery);
    if ($resultInsertJadwalQuery == true) {
        header('location:tabel_jadwal.php');
    }
}

if (isset($_POST['updateJadwal'])) {
    $idJadwal = mysqli_real_escape_string($connection, $_POST['idJadwal']);
    $kodeMatkul = mysqli_real_escape_string($connection, $_POST['kodeMatkul']);
    $kodeDosen = mysqli_real_escape_string($connection, $_POST['kodeDosen']);
    $hari = mysqli_real_escape_string($connection, $_POST['hari']);
    $jam = mysqli_real_escape_string($connection, $_POST['jam']);

    $updateJadwalQuery = "UPDATE tabel_jadwal SET kode_matakuliah = '$kodeMatkul', kode_dosen = '$kodeDosen', hari = '$hari', jam = '$jam' WHERE id = $idJadwal";
    $resultUpdateJadwalQuery = mysqli_query($connection, $updateJadwalQuery);

    if ($resultUpdateJadwalQuery == true) {
        header('location:tabel_jadwal.php');
        exit;
    }
}

if (isset($_POST['deleteJadwal'])) {
    $idJadwal = mysqli_real_escape_string($connection, $_POST['idJadwal']);
    $deleteJadwalQuery = "DELETE FROM tabel_jadwal WHERE id = $idJadwal";
    $resultDeleteJadwalQuery = mysqli_query($connection, $deleteJadwalQuery);
    if ($resultDeleteJadwalQuery == true) {
        header('location:tabel_jadwal.php');
        exit;
    }
}
