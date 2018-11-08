<?php
header("Content-Type: text/html; charset=UTF-8");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$dbh = new PDO('mysql:host=localhost; dbname=sockets', 'sockets', 'W7p9J5f6');
$dbh->exec("set names utf8");
?>