<?php

require('../vendor/autoload.php');

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$user_db = $_ENV['USER_DB'];
$host_db = $_ENV['HOST_DB'];
$port_db = $_ENV['PORT_DB'];
$name_db = $_ENV['NAME_DB'];
?>