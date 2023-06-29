<?php
include "database/connection.php";

if (isset($_POST['insertMahasiswa'])) {
    $nim = mysqli_real_escape_string($connection, $_POST['nim']);
    $nama = mysqli_real_escape_string($connection, $_POST['nama']);
    $jenisKelamin = mysqli_real_escape_string($connection, $_POST['jenisKelamin']);
    $alamat = mysqli_real_escape_string($connection, $_POST['alamat']);
    $jurusan = mysqli_real_escape_string($connection, $_POST['jurusan']);

    $insertMahasiswaQuery = "INSERT INTO tabel_mahasiswa VALUES ('$nim', '$nama', '$jenisKelamin', '$alamat', '$jurusan')";

    $isMahasiswaInserted = mysqli_query($connection, $insertMahasiswaQuery);
    if ($isMahasiswaInserted == true) {
        header('location:tabel_mahasiswa.php');
    }
}

if (isset($_POST['updateMahasiswa'])) {

    $nim = mysqli_real_escape_string($connection, $_POST['nim']);
    $nama = mysqli_real_escape_string($connection, $_POST['nama']);
    $jenisKelamin = mysqli_real_escape_string($connection, $_POST['jenisKelamin']);
    $alamat = mysqli_real_escape_string($connection, $_POST['alamat']);
    $jurusan = mysqli_real_escape_string($connection, $_POST['jurusan']);

    $updateMahasiswaQuery = "UPDATE tabel_mahasiswa SET nama_mahasiswa = '$nama', jenis_kelamin = '$jenisKelamin', alamat = '$alamat', jurusan = '$jurusan' WHERE nim = '$nim'";

    $isMahasiswaUpdated = mysqli_query($connection, $updateMahasiswaQuery);
    if ($isMahasiswaUpdated == true) {
        header('location:tabel_mahasiswa.php');
    }
}

if (isset($_POST['deleteMahasiswa'])) {
    $nim = mysqli_real_escape_string($connection, $_POST['nim']);
    $deleteMahasiswaQuery = "DELETE FROM tabel_mahasiswa WHERE nim = '$nim'";
    $isMahasiswaDeleted = mysqli_query($connection, $deleteMahasiswaQuery);
    if ($isMahasiswaDeleted == true) {
        header('location:tabel_mahasiswa.php');
    }
}
