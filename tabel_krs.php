<?php

include "auth.php";
include "database/connection.php";
include "controllers/krs_controller.php";

$getDataKRSQuery = "SELECT a.id AS id, a.nim AS nim, c.nama_mahasiswa AS nama_mahasiswa, e.kode_matakuliah AS kode_matkul, e.nama_matakuliah AS nama_matkul, e.sks AS sks, d.semester AS semester FROM tabel_krs a INNER JOIN tabel_jadwal b ON a.id_jadwal = b.id INNER JOIN tabel_mahasiswa c ON a.nim = c.nim INNER JOIN tabel_semester d ON a.kode_semester = d.kode_semester INNER JOIN tabel_matakuliah e ON b.kode_matakuliah = e.kode_matakuliah";
$getDataKRSResult = mysqli_query($connection, $getDataKRSQuery);

?>
<?php include "components/header.php"; ?>
<?php include "layouts/side_layout.php"; ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Table KRS</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Table KRS</li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    Berikut ini adalah data-data pada tabel KRS.
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Tambah KRS</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <th>NIM</th>
                                <th>Nama Mahasiswa</th>
                                <th>Kode Matakuliah</th>
                                <th>Nama Matakuliah</th>
                                <th>SKS</th>
                                <th>Semester</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                <?php while ($data = mysqli_fetch_array($getDataKRSResult)) { ?>
                                    <tr>
                                        <td><?= $data['nim']; ?></td>
                                        <td><?= $data['nama_mahasiswa']; ?></td>
                                        <td><?= $data['kode_matkul']; ?></td>
                                        <td><?= $data['nama_matkul']; ?></td>
                                        <td><?= $data['sks']; ?></td>
                                        <td><?= $data['semester']; ?></td>
                                        <td>
                                            <button class="btn btn-warning" type="button" data-toggle="modal" data-target="#edit<?= $data['id']; ?>">Edit</button>
                                            <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#delete<?= $data['id']; ?>">Delete</button>
                                        </td>
                                    </tr>
                                    <!-- Edit Modal -->
                                    <div class="modal fade" id="edit<?= $data['id']; ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Edit KRS</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>

                                                <!-- Modal body -->
                                                <form method="post">
                                                    <div class="modal-body">
                                                        <select name="nim" class="custom-select">
                                                            <option disabled selected>Pilih Mahasiswa</option>
                                                            <?php

                                                            $getMahasiswaQuery = "SELECT nim, nama_mahasiswa FROM tabel_mahasiswa";
                                                            $resultGetMahasiswaQuery = mysqli_query($connection, $getMahasiswaQuery);

                                                            while ($dataMahasiswa = mysqli_fetch_array($resultGetMahasiswaQuery)) { ?>
                                                                <option value="<?= $dataMahasiswa['nim'] ?>"><?= $dataMahasiswa['nama_mahasiswa']; ?></option>
                                                            <?php }; ?>
                                                        </select>
                                                        <br>
                                                        <br>
                                                        <select name="jadwal" class="custom-select">
                                                            <option disabled selected>Pilih Jadwal</option>
                                                            <?php

                                                            $getJadwalQuery = "SELECT * FROM tabel_jadwal";
                                                            $resultGetJadwalQuery = mysqli_query($connection, $getJadwalQuery);

                                                            while ($dataJadwal = mysqli_fetch_array($resultGetJadwalQuery)) { ?>
                                                                <option value="<?= $dataJadwal['id'] ?>"><?= $dataJadwal['kode_matakuliah']; ?> - <?= $dataJadwal['kode_dosen']; ?> - <?= $dataJadwal['hari']; ?> - <?= $dataJadwal['jam']; ?></option>
                                                            <?php }; ?>
                                                        </select>
                                                        <br>
                                                        <br>
                                                        <select name="semester" class="custom-select">
                                                            <option disabled selected>Pilih Semester</option>
                                                            <?php

                                                            $getSemesterQuery = "SELECT * FROM tabel_semester";

                                                            $resultGetSemesterQuery = mysqli_query($connection, $getSemesterQuery);

                                                            while ($dataSemester = mysqli_fetch_array($resultGetSemesterQuery)) { ?>
                                                                <option value="<?= $dataSemester['kode_semester'] ?>"><?= $dataSemester['semester']; ?> - <?= $dataSemester['status']; ?></option>
                                                            <?php }; ?>
                                                        </select>
                                                        <br>
                                                        <br>
                                                        <input type="hidden" name="idKrs" value="<?= $data['id']; ?>">
                                                        <input type="submit" value="Submit" class="btn btn-primary" name="updateKrs">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Delete Modal -->
                                    <div class="modal fade" id="delete<?= $data['id']; ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Hapus KRS</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>

                                                <!-- Modal body -->
                                                <form method="post">
                                                    <div class="modal-body">
                                                        Apakah Anda yakin ingin menghapus KRS dengan ID: <?= $data['id']; ?>?
                                                        <input type="hidden" name="idKrs" value="<?= $data['id']; ?>">
                                                        <br>
                                                        <br>
                                                        <button type="submit" class="btn btn-danger" name="deleteKrs">Hapus</button>
                                                        <br>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                <?php }; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include "components/footer.php"; ?>
    <!-- The Modal -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Tambah KRS</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form method="post">
                        <select name="nim" class="custom-select">
                            <option disabled selected>Pilih Mahasiswa</option>
                            <?php

                            $getMahasiswaQuery = "SELECT nim, nama_mahasiswa FROM tabel_mahasiswa";
                            $resultGetMahasiswaQuery = mysqli_query($connection, $getMahasiswaQuery);

                            while ($dataMahasiswa = mysqli_fetch_array($resultGetMahasiswaQuery)) { ?>
                                <option value="<?= $dataMahasiswa['nim'] ?>"><?= $dataMahasiswa['nama_mahasiswa']; ?></option>
                            <?php }; ?>
                        </select>
                        <br>
                        <br>
                        <select name="jadwal" class="custom-select">
                            <option disabled selected>Pilih Jadwal</option>
                            <?php

                            $getJadwalQuery = "SELECT * FROM tabel_jadwal";
                            $resultGetJadwalQuery = mysqli_query($connection, $getJadwalQuery);

                            while ($dataJadwal = mysqli_fetch_array($resultGetJadwalQuery)) { ?>
                                <option value="<?= $dataJadwal['id'] ?>"><?= $dataJadwal['kode_matakuliah']; ?> - <?= $dataJadwal['kode_dosen']; ?> - <?= $dataJadwal['hari']; ?> - <?= $dataJadwal['jam']; ?></option>
                            <?php }; ?>
                        </select>
                        <br>
                        <br>
                        <select name="semester" class="custom-select">
                            <option disabled selected>Pilih Semester</option>
                            <?php

                            $getSemesterQuery = "SELECT * FROM tabel_semester";

                            $resultGetSemesterQuery = mysqli_query($connection, $getSemesterQuery);

                            while ($dataSemester = mysqli_fetch_array($resultGetSemesterQuery)) { ?>
                                <option value="<?= $dataSemester['kode_semester'] ?>"><?= $dataSemester['semester']; ?> - <?= $dataSemester['status']; ?></option>
                            <?php }; ?>
                        </select>
                        <br>
                        <br>
                        <input type="submit" value="Submit" class="btn btn-primary" name="insertKrs">
                    </form>
                </div>
            </div>
        </div>
    </div>