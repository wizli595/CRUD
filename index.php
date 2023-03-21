<?php include('config.php') ?>
<?php include('extras/head.php') ?>
<?php
$sql = 'select * from employee';
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
// print_r($data)
?>

<body>
    <div class="container bg-light w-75 my-5 rounded-bottom rounded-top">
        <h2 class="text-center">List of employees</h2>
        <a href="CRUD/create.php" class="btn btn-success">new emploee</a>
        <table class="table">
            <thead>
                <tr class="text-capitalize">
                    <th>ID</th>
                    <th>name</th>
                    <th>email</th>
                    <th>phone</th>
                    <th>adress</th>
                    <th>created at</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($data as $item) {
                    echo "
                        <tr>
                        <td>$item[id]</td>
                        <td>$item[name]</td>
                        <td>$item[email]</td>
                        <td>$item[phone]</td>
                        <td class='text-capitalize'>$item[address]</td>
                        <td>$item[created_at]</td>
                        <td >
                            <a href=CRUD/edit.php?id=$item[id] class='btn btn-primary btn-sm'>Edit</a>
                            <a href='CRUD/delete.php?id=$item[id]' class='btn btn-danger btn-sm'>Delete</a>
                        </td>
                    </tr>
                    ";
                }
                ?>

            </tbody>
        </table>
    </div>
</body>

</html>