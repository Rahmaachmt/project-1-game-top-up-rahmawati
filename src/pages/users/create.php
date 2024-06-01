<?php
require_once '../../../config/database.php';
require_once '../../../app/Users.php';

$database = new Database();
$db = $database->dbConnection();

$user = new Users($db);

if (isset($_POST['tambah'])) {
    $user->username = $_POST['username'];
    $user->email = $_POST['email'];
    $user->password = $_POST['password'];
    $user->balance = $_POST['balance'];


    $user->store();
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Form</title>
        <link href="../../../src/assets/css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
<main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Tambah</h3></div>
                                    <div class="card-body">
                                        <form method="POST" action="">
                                            <div class="form-floating mb-3 text-dark">
                                                <input class="form-control" name="username" type="text" placeholder="username" />
                                                <label for="username">Username</label>
                                            </div>
                                            <div class="form-floating mb-3 text-dark">
                                                <input class="form-control" name="email" type="email" placeholder="email" />
                                                <label for="email">Email</label>
                                            </div>
                                            <div class="form-floating mb-3 text-dark">
                                                <input class="form-control" name="password" type="password" placeholder="password" />
                                                <label for="password">Password</label>
                                            </div>
                                            <div class="form-floating mb-3 text-dark">
                                                <input class="form-control" name="balance" type="text" placeholder="balance" />
                                                <label for="balance">Balance</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-end mt-4 mb-0">
                                                <input class="btn btn-primary" type="submit" name="tambah" value="Tambah">
                                            </div>
                                        </form>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
</main>
</div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../../../src/assets/js/scripts.js"></script>
    </body>
</html>