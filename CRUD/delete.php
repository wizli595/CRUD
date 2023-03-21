<?php include('../config.php') ?>
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "delete from employee where id=$id";
    $conn->query($sql);
}
header("location:../index.php");
exit;
?>