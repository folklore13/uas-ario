<?php

include "database/connection.php";

if (isset($_POST['insertKrs'])) {
    $nim = mysqli_real_escape_string($connection, $_POST['nim']);
    $idJadwal = mysqli_real_escape_string($connection, $_POST['jadwal']);
    $kodeSemester = mysqli_real_escape_string($connection, $_POST['semester']);

    $insertKrsQuery = "INSERT INTO tabel_krs (nim, id_jadwal, kode_semester) VALUES ('$nim', '$idJadwal', '$kodeSemester')";
    $resultInsertKrsQuery = mysqli_query($connection, $insertKrsQuery);
    if ($resultInsertKrsQuery == true) {
        header('location:tabel_krs.php');
        exit;
    }
}

if (isset($_POST['updateKrs'])) {
    $idKrs = mysqli_real_escape_string($connection, $_POST['idKrs']);
    $nim = mysqli_real_escape_string($connection, $_POST['nim']);
    $idJadwal = mysqli_real_escape_string($connection, $_POST['jadwal']);
    $kodeSemester = mysqli_real_escape_string($connection, $_POST['semester']);

    $updateKrsQuery = "UPDATE tabel_krs SET nim = '$nim', id_jadwal = '$idJadwal', kode_semester = '$kodeSemester' WHERE id = $idKrs";
    $resultUpdateKrsQuery = mysqli_query($connection, $updateKrsQuery);
    if ($resultUpdateKrsQuery == true) {
        header('location:tabel_krs.php');
        exit;
    }
}

if (isset($_POST['deleteKrs'])) {
    $idKrs = mysqli_real_escape_string($connection, $_POST['idKrs']);

    $deleteKrsQuery = "DELETE FROM tabel_krs WHERE id = $idKrs";
    $resultDeleteKrsQuery = mysqli_query($connection, $deleteKrsQuery);
    if ($resultDeleteKrsQuery == true) {
        header('location:tabel_krs.php');
        exit;
    }
}
