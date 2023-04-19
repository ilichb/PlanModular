<?php  

require_once('./config.php');

$DB_USER = $user_db;
$DB_HOST = $host_db;
$DB_PORT = $port_db;
$DB_NAME = $name_db;


$conn = mysqli_connect($DB_HOST, $DB_USER, '', $DB_NAME, NULL, MYSQLI_CLIENT_SSL);

?>