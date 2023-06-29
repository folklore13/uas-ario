<?php

include "database/connection.php";

if (isset($_POST['insertSemester'])) {
    $semester = mysqli_real_escape_string($connection, $_POST['semester']);
    $status = mysqli_real_escape_string($connection, $_POST['status']);

    $insertSemesterQuery = "INSERT INTO tabel_semester (semester, status) VALUES ('$semester', '$status')";
    $resultInsertSemesterQuery = mysqli_query($connection, $insertSemesterQuery);
    if ($resultInsertSemesterQuery == true) {
        header('location:tabel_semester.php');
        exit;
    }
}

if (isset($_POST['updateSemester'])) {
    $kodeSemester = mysqli_real_escape_string($connection, $_POST['kodeSemester']);
    $semester = mysqli_real_escape_string($connection, $_POST['semester']);
    $status = mysqli_real_escape_string($connection, $_POST['status']);

    $updateSemesterQuery = "UPDATE tabel_semester SET semester = '$semester', status = '$status' WHERE kode_semester = '$kodeSemester'";
    $resultUpdateSemesterQuery = mysqli_query($connection, $updateSemesterQuery);
    if ($resultUpdateSemesterQuery == true) {
        header('location:tabel_semester.php');
        exit;
    }
}

if (isset($_POST['deleteSemester'])) {
    $kodeSemester = mysqli_real_escape_string($connection, $_POST['kodeSemester']);
    $deleteSemesterQuery = "DELETE FROM tabel_semester WHERE kode_semester = '$kodeSemester'";
    $resultDeleteSemesterQuery = mysqli_query($connection, $deleteSemesterQuery);
    if ($resultDeleteSemesterQuery == true) {
        header('location:tabel_semester.php');
        exit;
    }
}
