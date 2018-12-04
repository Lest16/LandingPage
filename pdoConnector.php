<?php
include_once 'config.php';

$dsn = "mysql:host=$db_host;port=$db_port;dbname=$db_base;charset=$charset;";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

$pdo = new PDO($dsn, $db_user, $db_password, $opt);