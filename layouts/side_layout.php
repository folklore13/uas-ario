<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="index.html">MyStudent</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
        <p style="color: white;" class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0"><?= $_SESSION['username']; ?></p>
        <!-- Navbar-->
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="logout.php">Logout</a>
                </div>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link mt-4" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Kumpulan Tabel</div>
                        <a class="nav-link" href="../uas-ario/tabel_mahasiswa.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Tabel Mahasiswa
                        </a>
                        <a class="nav-link" href="../uas-ario/tabel_dosen.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Tabel Dosen
                        </a>
                        <a class="nav-link" href="../uas-ario/tabel_krs.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Tabel KRS
                        </a>
                        <a class="nav-link" href="../uas-ario/tabel_jadwal.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Tabel Jadwal
                        </a>
                        <a class="nav-link" href="../uas-ario/tabel_matakuliah.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Tabel Matakuliah
                        </a>
                        <a class="nav-link" href="../uas-ario/tabel_semester.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Tabel Semester
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as: <?= $_SESSION['username']; ?></div>
                </div>
            </nav>
        </div>