<?php
require_once '../../../config/database.php';
require_once '../../../app/Games.php';

$database = new Database();
$db = $database->dbConnection();

$game = new Games($db);

if (isset($_POST['update'])) {
    $game->id = $_POST['id'];
    $game->name = $_POST['name'];
    $game->platform = $_POST['platform'];


    $game->update();
    header("Location: index.php");
    exit;
} elseif (isset($_GET['id'])) {
    $game->id = $_GET['id'];
    $stmt = $game->edit();
    $num = $stmt->rowCount();

    if ($num > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        extract($row);
    } else {
        echo "Data tidak ditemukan.";
        exit;
    }
} else {
    echo "ID tidak ditemukan.";
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
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Edit</h3></div>
                                    <div class="card-body">
                                        <form method="POST" action="">
                                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                                            <div class="form-floating mb-3 text-dark">
                                                <input class="form-control" name="name" type="text" value="<?php echo $name; ?>" placeholder="name" />
                                                <label for="name">Name</label>
                                            </div>
                                            <div class="form-floating mb-3 text-dark">
                                                <input class="form-control" name="platform" type="text" value="<?php echo $platform; ?>" placeholder="platform" />
                                                <label for="platform">Platform</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-end mt-4 mb-0">
                                                <input class="btn btn-primary" type="submit" name="update" value="Update">
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
