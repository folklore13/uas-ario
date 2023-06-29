<?php

include "auth.php";
include "database/connection.php";
include "controllers/dosen_controller.php";

$getDataDosenQuery = "SELECT * FROM tabel_dosen";
$getDataDosenResult = mysqli_query($connection, $getDataDosenQuery);

?>
<?php include "components/header.php"; ?>
<?php include "layouts/side_layout.php"; ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Table Dosen</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Table Dosen</li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    Berikut ini adalah data-data pada tabel dosen.
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Tambah Dosen</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <th>Kode Dosen</th>
                                <th>Nama Dosen</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th>Telepon</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                while ($dosen = mysqli_fetch_array($getDataDosenResult)) { ?>
                                    <tr>
                                        <td><?= $dosen['kode_dosen']; ?></td>
                                        <td><?= $dosen['nama_dosen']; ?></td>
                                        <td><?= $dosen['jenis_kelamin']; ?></td>
                                        <td><?= $dosen['alamat']; ?></td>
                                        <td><?= $dosen['telepon']; ?></td>
                                        <td>
                                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?= $dosen['kode_dosen']; ?>">Edit</button>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?= $dosen['kode_dosen']; ?>">Delete</button>
                                        </td>
                                    </tr>
                                    <!-- Edit Modal -->
                                    <div class="modal fade" id="edit<?= $dosen['kode_dosen']; ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Edit Data Dosen</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>

                                                <!-- Modal body -->
                                                <form method="post">
                                                    <div class="modal-body">
                                                        <input type="text" name="namaDosen" value="<?= $dosen['nama_dosen']; ?>" class="form-control" required>
                                                        <br>
                                                        <input type="text" name="jenisKelamin" value="<?= $dosen['jenis_kelamin']; ?>" class="form-control" required>
                                                        <br>
                                                        <input type="text" name="alamat" class="form-control" value="<?= $dosen['alamat']; ?>" required>
                                                        <br>
                                                        <input type="text" name="telepon" class="form-control" value="<?= $dosen['telepon']; ?>" required>
                                                        <br>
                                                        <input type="hidden" name="kodeDosen" value="<?= $dosen['kode_dosen']; ?>">
                                                        <button type="submit" class="btn btn-warning" name="updateDosen">Update</button>
                                                        <br>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Delete Modal -->
                                    <div class="modal fade" id="delete<?= $dosen['kode_dosen']; ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Hapus Data Dosen</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>

                                                <!-- Modal body -->
                                                <form method="post">
                                                    <div class="modal-body">
                                                        Apakah Anda yakin ingin menghapus data dosen dengan Kode Dosen: <?= $dosen['kode_dosen']; ?>?
                                                        <input type="hidden" name="kodeDosen" value="<?= $dosen['kode_dosen']; ?>">
                                                        <br>
                                                        <br>
                                                        <button type="submit" class="btn btn-danger" name="deleteDosen">Hapus</button>
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
                    <h4 class="modal-title">Tambah Dosen</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <form method="post">
                    <div class="modal-body">
                        <input type="text" name="namaDosen" placeholder="Masukkan Nama Dosen" class="form-control" required>
                        <br>
                        <input type="text" name="jenisKelamin" placeholder="Masukkan Jenis Kelamin" class="form-control" required>
                        <br>
                        <input type="text" name="alamat" class="form-control" placeholder="Masukkan Alamat" required>
                        <br>
                        <input type="text" name="telepon" class="form-control" placeholder="Masukkan Telepon" required>
                        <br>
                        <button type="submit" class="btn btn-primary" name="insertDosen">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>