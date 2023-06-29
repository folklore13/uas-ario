<?php

include "auth.php";
include "database/connection.php";
include "controllers/jadwal_controller.php";

$getDataJadwalQuery = "SELECT a.id AS id, a.kode_matakuliah AS kode_matakuliah, b.nama_matakuliah AS nama_matakuliah, a.kode_dosen AS kode_dosen, c.nama_dosen AS nama_dosen, hari, jam FROM tabel_jadwal a INNER JOIN tabel_matakuliah b ON a.kode_matakuliah = b.kode_matakuliah INNER JOIN tabel_dosen c ON a.kode_dosen = c.kode_dosen";

$getDataJadwalResult = mysqli_query($connection, $getDataJadwalQuery);

?>
<?php include "components/header.php"; ?>
<?php include "layouts/side_layout.php"; ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Table Jadwal</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Table Jadwal</li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    Berikut ini adalah data-data pada tabel jadwal.
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <!-- Button to Open the Modal -->
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
                        Tambah Jadwal
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <th>Kode Matakuliah</th>
                                <th>Nama Matakuliah</th>
                                <th>Kode Dosen</th>
                                <th>Nama Dosen</th>
                                <th>Hari</th>
                                <th>Jam</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                <?php while ($data = mysqli_fetch_array($getDataJadwalResult)) { ?>
                                    <tr>
                                        <td><?= $data['kode_matakuliah']; ?></td>
                                        <td><?= $data['nama_matakuliah']; ?></td>
                                        <td><?= $data['kode_dosen']; ?></td>
                                        <td><?= $data['nama_dosen']; ?></td>
                                        <td><?= $data['hari']; ?></td>
                                        <td><?= $data['jam']; ?></td>
                                        <td>
                                            <button class="btn btn-warning" type="button" data-toggle="modal" data-target="#edit<?= $data['id'] ?>">Edit</button>
                                            <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#delete<?= $data['id'] ?>">Delete</button>
                                        </td>
                                        <!-- Edit Modal -->
                                        <div class="modal fade" id="edit<?= $data['id']; ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Edit Jadwal</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <form method="post">
                                                        <div class="modal-body">
                                                            <select name="kodeMatkul" class="custom-select">
                                                                <option disabled selected>Pilih Matakuliah</option>
                                                                <?php
                                                                $getDataMatkulQuery = "SELECT kode_matakuliah, nama_matakuliah FROM tabel_matakuliah";
                                                                $resultGetDataMatkulQuery = mysqli_query($connection, $getDataMatkulQuery);
                                                                ?>
                                                                <?php while ($dataMatkul = mysqli_fetch_array($resultGetDataMatkulQuery)) { ?>
                                                                    <option value="<?= $dataMatkul['kode_matakuliah'] ?>"><?= $dataMatkul['nama_matakuliah']; ?></option>
                                                                <?php }; ?>
                                                            </select>
                                                            <br>
                                                            <br>
                                                            <select name="kodeDosen" class="custom-select">
                                                                <option disabled selected>Pilih Dosen</option>
                                                                <?php

                                                                $getDataDosenQuery = "SELECT kode_dosen, nama_dosen FROM tabel_dosen";
                                                                $resultGetDataDosenQuery = mysqli_query($connection, $getDataDosenQuery);

                                                                while ($dataDosen = mysqli_fetch_array($resultGetDataDosenQuery)) {

                                                                ?>
                                                                    <option value="<?= $dataDosen['kode_dosen'] ?>"><?= $dataDosen['nama_dosen']; ?></option>
                                                                <?php }; ?>
                                                            </select>
                                                            <br>
                                                            <br>
                                                            <input class="form-control" type="text" name="hari" placeholder="Masukkan Hari">
                                                            <br>
                                                            <input class="form-control" type="text" name="jam" placeholder="Masukkan Jam">
                                                            <br>
                                                            <input type="hidden" name="idJadwal" value=<?= $data['id'] ?>>
                                                            <input type="submit" value="Submit" name="updateJadwal" class="btn btn-primary">
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
                                                        <h4 class="modal-title">Hapus Jadwal</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <form method="post">
                                                        <div class="modal-body">
                                                            Apakah Anda yakin ingin menghapus jadwal dengan ID: <?= $data['id']; ?>?
                                                            <input type="hidden" name="idJadwal" value="<?= $data['id']; ?>">
                                                            <br>
                                                            <br>
                                                            <button type="submit" class="btn btn-danger" name="deleteJadwal">Hapus</button>
                                                            <br>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </tr>
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
                    <h4 class="modal-title">Tambah Jadwal</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <form method="post">
                    <div class="modal-body">
                        <select name="kodeMatkul" class="custom-select">
                            <option disabled selected>Pilih Matakuliah</option>
                            <?php
                            $getDataMatkulQuery = "SELECT kode_matakuliah, nama_matakuliah FROM tabel_matakuliah";
                            $resultGetDataMatkulQuery = mysqli_query($connection, $getDataMatkulQuery);
                            ?>
                            <?php while ($dataMatkul = mysqli_fetch_array($resultGetDataMatkulQuery)) { ?>
                                <option value="<?= $dataMatkul['kode_matakuliah'] ?>"><?= $dataMatkul['nama_matakuliah']; ?></option>
                            <?php }; ?>
                        </select>
                        <br>
                        <br>
                        <select name="kodeDosen" class="custom-select">
                            <option disabled selected>Pilih Dosen</option>
                            <?php

                            $getDataDosenQuery = "SELECT kode_dosen, nama_dosen FROM tabel_dosen";
                            $resultGetDataDosenQuery = mysqli_query($connection, $getDataDosenQuery);

                            while ($dataDosen = mysqli_fetch_array($resultGetDataDosenQuery)) {

                            ?>
                                <option value="<?= $dataDosen['kode_dosen'] ?>"><?= $dataDosen['nama_dosen']; ?></option>
                            <?php }; ?>
                        </select>
                        <br>
                        <br>
                        <input class="form-control" type="text" name="hari" placeholder="Masukkan Hari" required>
                        <br>
                        <input class="form-control" type="text" name="jam" placeholder="Masukkan Jam" required>
                        <br>
                        <input type="submit" value="Submit" name="insertJadwal" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>