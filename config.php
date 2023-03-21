<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'me');
define('DB_PASS', '12345678');
define('DB_NAME', 'client');
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if ($conn->connect_error) {
    die('failed' . $conn->connect_error);
}
// echo 'connect';
