<?php

include "auth.php";
include "database/connection.php";
include "controllers/mahasiswa_controller.php";

$getDataMahasiswaQuery = "SELECT * FROM tabel_mahasiswa";
$getDataMahasiswaResult = mysqli_query($connection, $getDataMahasiswaQuery);


?>
<?php include "components/header.php"; ?>
<?php include "layouts/side_layout.php"; ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Table Mahasiswa</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Table Mahasiswa</li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    Berikut ini adalah data-data pada tabel mahasiswa.
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <!-- Button to Open the Modal -->
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
                        Tambah Mahasiswa
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <th>NIM</th>
                                <th>Nama Mahasiswa</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th>Jurusan</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                <?php
                                while ($mahasiswa = mysqli_fetch_array($getDataMahasiswaResult)) {
                                ?>
                                    <tr>
                                        <td><?= $mahasiswa['nim']; ?></td>
                                        <td><?= $mahasiswa['nama_mahasiswa']; ?></td>
                                        <td><?= $mahasiswa['jenis_kelamin']; ?></td>
                                        <td><?= $mahasiswa['alamat']; ?></td>
                                        <td><?= $mahasiswa['jurusan']; ?></td>
                                        <td>
                                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?= $mahasiswa['nim']; ?>">Edit</button>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?= $mahasiswa['nim']; ?>">Delete</button>
                                        </td>
                                    </tr>
                                    <!-- Edit Modal -->
                                    <div class="modal fade" id="edit<?= $mahasiswa['nim']; ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Edit Mahasiswa</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>

                                                <!-- Modal body -->
                                                <form method="post">
                                                    <div class="modal-body">
                                                        <input type="text" name="nama" value="<?= $mahasiswa['nama_mahasiswa']; ?>" class="form-control" required>
                                                        <br>
                                                        <input type="text" name="jenisKelamin" value="<?= $mahasiswa['jenis_kelamin']; ?>" class="form-control" required>
                                                        <br>
                                                        <input type="text" name="alamat" class="form-control" value="<?= $mahasiswa['alamat']; ?>" required>
                                                        <br>
                                                        <input type="text" name="jurusan" class="form-control" value="<?= $mahasiswa['jurusan']; ?>" required>
                                                        <br>
                                                        <input type="hidden" name="nim" value="<?= $mahasiswa['nim']; ?>">
                                                        <button type="submit" class="btn btn-warning" name="updateMahasiswa">Update</button>
                                                        <br>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Delete Modal -->
                                    <div class="modal fade" id="delete<?= $mahasiswa['nim']; ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Hapus Data Mahasiswa</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>

                                                <!-- Modal body -->
                                                <form method="post">
                                                    <div class="modal-body">
                                                        Apakah Anda yakin ingin menghapus data mahasiswa dengan NIM: <?= $mahasiswa['nim']; ?>?
                                                        <input type="hidden" name="nim" value="<?= $mahasiswa['nim']; ?>">
                                                        <br>
                                                        <button type="submit" class="btn btn-danger" name="deleteMahasiswa">Hapus</button>
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
                    <h4 class="modal-title">Tambah Mahasiswa</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <form method="post">
                    <div class="modal-body">
                        <input type="text" name="nim" readonly class="form-control" value="<?= date('y') . "01" . date('m') . rand(10, 50) . rand(10, 50) ?>">
                        <br>
                        <input type="text" name="nama" placeholder="Masukkan Nama Mahasiswa" class="form-control" required>
                        <br>
                        <input type="text" name="jenisKelamin" placeholder="Masukkan Jenis Kelamin" class="form-control" required>
                        <br>
                        <input type="text" name="alamat" class="form-control" placeholder="Masukkan Alamat" required>
                        <br>
                        <input type="text" name="jurusan" class="form-control" placeholder="Masukkan Jurusan" required>
                        <br>
                        <button type="submit" class="btn btn-primary" name="insertMahasiswa">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>