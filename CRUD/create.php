<?php include('../extras/head.php') ?>
<?php
$server_name = "localhost";
$user_name = "me";
$pass_name = "12345678";
$db_name = "client";
$connection = new mysqli($server_name, $user_name, $pass_name, $db_name);
$name = $email = $phone = $address = '';
$err_message = '';
$succ_message = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    do {
        if (empty($name) || empty($email) || empty($phone) || empty($address)) {
            $err_message = "all inputs are required";
            break;
        }
        try {
            $sql = "insert into employee (name,email,phone,address)" . "values('$name','$email','$phone','$address')";
            $result = $connection->query($sql);
        } catch (\Exception $e) {
            $err_message = "Invalid Query: " . $connection->error;
            break;
        };
        $name = $email = $phone = $address = '';
        $succ_message = "all good";
        header('location:../index.php');
        exit;
    } while (false);
}
?>

<body>
    <div class="container bg-light my-5 text-capitalize">
        <h2 class="text-center mb-5">new emoloyee</h2>
        <?php
        if (!empty($err_message)) {
            echo "
            <div class='alert alert-warning alert-dismissible fade show'>
            <strong>$err_message</strong>
            <button class='btn-close' aria-label='close' type='button' data-bs-dismiss='alert'></button>
            </div>
            ";
        }
        ?>

        <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="row mb-3 d-flex justify-content-center">
                <label for="name" class="col-sm-3 col-from-label">name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" placeholder="your name" value="<?= $name ?>">
                </div>
            </div>
            <div class="row mb-3 d-flex justify-content-center">
                <label for="email" class="col-sm-3 col-from-label">email</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="email" placeholder="your email" value="<?= $email ?>">
                </div>
            </div>
            <div class="row mb-3 d-flex justify-content-center">
                <label for="phone" class="col-sm-3 col-from-label">phone</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="phone" placeholder="your phone" value="<?= $phone ?>">
                </div>
            </div>
            <div class="row mb-3 d-flex justify-content-center">
                <label for="address" class="col-sm-3 col-from-label">address</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="address" placeholder="your address" value="<?= $address ?>">
                </div>
            </div>
            <?php
            if (!empty($succ_message)) {
                echo "
                        <div class='alert alert-success alert-dismissible fade show'>
                            <strong>$succ_message</strong>
                            <button class='btn-close' aria-label='close' type='button' data-bs-dismiss='alert'></button>
                        </div>

                    ";
            }
            ?>

            <div class="row">
                <div class="col-6 mb-3">
                    <input type="submit" value="submit" class="btn btn-success">
                    <a href="../index.php" class="btn btn-danger">cancel</a>
                </div>

            </div>
        </form>
    </div>
</body>