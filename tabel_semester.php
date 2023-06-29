<?php

include "auth.php";
include "database/connection.php";
include "controllers/semester_controller.php";

$getDataSemesterQuery = "SELECT * FROM tabel_semester";
$getDataSemesterResult = mysqli_query($connection, $getDataSemesterQuery);

?>
<?php include "components/header.php"; ?>
<?php include "layouts/side_layout.php"; ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Table Semester</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active">Table Semester</li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    Berikut ini adalah data-data pada tabel semester.
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Tambah Semester</button>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <th>Kode Semester</th>
                                <th>Semester</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                <?php while ($data = mysqli_fetch_array($getDataSemesterResult)) { ?>
                                    <tr>
                                        <td><?= $data['kode_semester']; ?></td>
                                        <td><?= $data['semester']; ?></td>
                                        <td><?= $data['status']; ?></td>
                                        <td>
                                            <button class="btn btn-warning" type="button" data-toggle="modal" data-target="#edit<?= $data['kode_semester']; ?>">Edit</button>
                                            <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#delete<?= $data['kode_semester']; ?>">Delete</button>
                                        </td>
                                    </tr>
                                    <!-- Edit Modal -->
                                    <div class="modal fade" id="edit<?= $data['kode_semester']; ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Edit Semester</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>

                                                <!-- Modal body -->
                                                <form method="post">
                                                    <div class="modal-body">
                                                        <input class="form-control" type="text" name="semester" value="<?= $data['semester']; ?>">
                                                        <br>
                                                        <input class="form-control" type="text" name="status" value="<?= $data['status']; ?>">
                                                        <br>
                                                        <input type="hidden" name="kodeSemester" value="<?= $data['kode_semester']; ?>">
                                                        <button type="submit" class="btn btn-warning" name="updateSemester">Update</button>
                                                        <br>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Delete Modal -->
                                    <div class="modal fade" id="delete<?= $data['kode_semester']; ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Hapus Data Semester</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>

                                                <!-- Modal body -->
                                                <form method="post">
                                                    <div class="modal-body">
                                                        Apakah Anda yakin ingin menghapus data semester dengan kode: <?= $data['kode_semester']; ?>?
                                                        <input type="hidden" name="kodeSemester" value="<?= $data['kode_semester']; ?>">
                                                        <br>
                                                        <button type="submit" class="btn btn-danger" name="deleteSemester">Hapus</button>
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
                    <h4 class="modal-title">Tambah Semester</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <form method="post">
                    <div class="modal-body">
                        <input type="text" class="form-control" name="semester" placeholder="Masukkan Semester">
                        <br>
                        <input type="text" class="form-control" name="status" placeholder="Masukkan Status">
                        <br>
                        <button type="submit" class="btn btn-primary" name="insertSemester">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>