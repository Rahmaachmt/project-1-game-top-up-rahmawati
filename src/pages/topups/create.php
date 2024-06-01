<?php
require_once '../../../config/database.php';
require_once '../../../app/Topups.php';

$database = new Database();
$db = $database->dbConnection();

$topup = new Topups($db);

if (isset($_POST['tambah'])) {
    $topup->user_id = $_POST['user_id'];
    $topup->game_id = $_POST['game_id'];
    $topup->amount = $_POST['amount'];
    $topup->topup_date = $_POST['topup_date'];


    $topup->store();
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
                                                <input class="form-control" name="user_id" type="number" placeholder="user_id" />
                                                <label for="user_id">User ID</label>
                                            </div>
                                            <div class="form-floating mb-3 text-dark">
                                                <input class="form-control" name="game_id" type="number" placeholder="game_id" />
                                                <label for="game_id">Game ID</label>
                                            </div>
                                            <div class="form-floating mb-3 text-dark">
                                                <input class="form-control" name="amount" type="number" placeholder="amount" />
                                                <label for="amount">Amount</label>
                                            </div>
                                            <div class="form-floating mb-3 text-dark">
                                                <input class="form-control" name="topup_date" type="date" placeholder="topup_date" />
                                                <label for="topup_date">Topup Date</label>
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
