<?php
define('SERVER', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', '');
define('DATABASE', 'attandance_db');

$conn = new mysqli(SERVER, USERNAME, PASSWORD, DATABASE);
if ($conn->connect_error) {
    die("there is" . $conn->connect_error);
}
// echo("conection established");

?>