<?php

include "auth.php";
include "database/connection.php";
include "controllers/matakuliah_controller.php";

$getDataMatkulQuery = "SELECT * FROM tabel_matakuliah";
$getDataMatkulResult = mysqli_query($connection, $getDataMatkulQuery);

?>
<?php include "components/header.php"; ?>
<?php include "layouts/side_layout.php"; ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Table Matakuliah</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Table Matakuliah</li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    Berikut ini adalah data-data pada tabel matakuliah.
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Tambah Matakuliah</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <th>ID Matakuliah</th>
                                <th>Nama Matakuliah</th>
                                <th>SKS</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                <?php while ($data = mysqli_fetch_array($getDataMatkulResult)) { ?>
                                    <tr>
                                        <td><?= $data['kode_matakuliah']; ?></td>
                                        <td><?= $data['nama_matakuliah']; ?></td>
                                        <td><?= $data['sks']; ?></td>
                                        <td>
                                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?= $data['kode_matakuliah'] ?>">Edit</button>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?= $data['kode_matakuliah'] ?>">Delete</button>
                                        </td>
                                    </tr>
                                    <!-- Edit Modal -->
                                    <div class="modal fade" id="edit<?= $data['kode_matakuliah']; ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Edit Data Matakuliah</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>

                                                <!-- Modal body -->
                                                <form method="post">
                                                    <div class="modal-body">
                                                        <input type="text" name="namaMatkul" value="<?= $data['nama_matakuliah']; ?>" class="form-control" required>
                                                        <br>
                                                        <input type="number" name="sks" value="<?= $data['sks']; ?>" class="form-control">
                                                        <input type="hidden" name="kodeMatkul" value="<?= $data['kode_matakuliah']; ?>">
                                                        <br>
                                                        <button type="submit" class="btn btn-warning" name="updateMatkul">Update</button>
                                                        <br>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Delete Modal -->
                                    <div class="modal fade" id="delete<?= $data['kode_matakuliah']; ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Hapus Data Matakuliah</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>

                                                <!-- Modal body -->
                                                <form method="post">
                                                    <div class="modal-body">
                                                        Apakah Anda yakin ingin menghapus data matakuliah dengan Kode Matakuliah: <?= $data['kode_matakuliah']; ?>?
                                                        <input type="hidden" name="kodeMatkul" value="<?= $data['kode_matakuliah']; ?>">
                                                        <br>
                                                        <button type="submit" class="btn btn-danger" name="deleteMatkul">Hapus</button>
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
                    <h4 class="modal-title">Tambah Matakuliah</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <form method="post">
                    <div class="modal-body">
                        <input type="text" class="form-control" placeholder="Masukkan Nama Matakuliah" name="namaMatkul" required>
                        <br>
                        <input type="number" class="form-control" placeholder="Masukkan Jumlah SKS" name="sks" required>
                        <br>
                        <input type="submit" value="Submit" name="insertMatkul" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>