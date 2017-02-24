<?php
$host = '128.199.236.139';
$db = 'parking';
$user = 'root';
$pass = 'xitgmLwmp';
$charset = 'utf8';

$baseUri = "http://{$_SERVER['HTTP_HOST']}/";
if($baseUri == 'http://localhost/'){
	$host = 'localhost';
	$db = 'parking';
	$user = 'root';
	$pass = 'BEsfkHuyHc5PJsvF';
}

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, $user, $pass, $opt);