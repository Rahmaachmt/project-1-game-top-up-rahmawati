<?php
require_once '../../../config/database.php';
require_once '../../../app/Users.php';

$database = new Database();
$db = $database->dbConnection();

$user = new Users($db);

// Cek jika parameter id ada pada URL
if (isset($_GET['id'])) {
    $user->id = $_GET['id'];

    if ($user->delete()) {
        header("Location: index.php");
    } else {
        echo "Gagal menghapus produk.";
    }
}

// Tampilkan data dari method index
$data = $user->index();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>TopUp</title>
    <link rel="stylesheet" href="../../../src/assets/css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-success">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.php"><i class="fa-brands fa-steam-symbol"></i> Games Shop</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar-->
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                <div class="sb-sidenav-menu bg-secondary">
                    <div class="nav">
                        <a class="nav-link" href="../../../index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                            Home
                        </a>
                        <a class="nav-link" href="../../../src/pages/games/index.php">
                            <div class="sb-nav-link-icon"><i class="fa-brands fa-steam-symbol"></i></div>
                            Games
                        </a>

                        <a class="nav-link" href="../../../src/pages/topups/index.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-money-bills"></i></div>
                            Top Up
                        </a>
                        <a class="nav-link" href="../../../src/pages/transactions/index.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-money-bill-trend-up"></i></div>
                            Transaksi
                        </a>
                        <a class="nav-link" href="../../../src/pages/users/index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                            Users
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer sb-sidenav-light">
                    Copyright
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
    <main>
                <div class="container-fluid px-4">
                    <h2 class="text-center mb-4 mt-4">Users</h2>
                        <div class="mt-4">                      
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Password</th>
                                        <th>Balance</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $no = 1;
                                    foreach($data as $row) { ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>            
                                        <td><?php echo $row['username']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td><?php echo $row['password']; ?></td>
                                        <td><?php echo $row['balance']; ?></td>
                                        <td>
                                            <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-warning font-weight-bold">Edit</a>
                                            |
                                            <a href="index.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')" class="btn btn-danger">Hapus</a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-6"> 
                                </div>
                                <div class="col-6 d-flex flex-row-reverse">
                                <a href="create.php" class="btn btn-primary">Tambah</a>
                                </div>
                            </div>
                        </div>  
                </div>
            </main>
            <div>
</div>
<footer class="py-4 bg-light mt-auto">
                                <div class="container-fluid px-4">
                                    <div class="d-flex align-items-center justify-content-between small">
                                        <div class="text-muted">Copyright &copy; Your Website 2023</div>
                                        <div>
                                            <a href="#">Privacy Policy</a>
                                            &middot;
                                            <a href="#">Terms &amp; Conditions</a>
                                        </div>
                                    </div>
                                </div>
                            </footer>
                        </div>
                    </div>
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
                    <script src="src/assets/js/scripts.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
                    <script src="src/assets/js/demo/chart-area-demo.js"></script>
                    <script src="src/assets/js/demo/chart-bar-demo.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
                    <script src="src/assets/js/datatables-simple-demo.js"></script>
</body>

</html>