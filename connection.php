<?php
DEFINE('DB_USER', 'n1kolson');
DEFINE('DB_PASSWORD', '1qaz2wsx');
DEFINE('DB_HOST', '51.254.188.120');
DEFINE('DB_NAME', 'n1kolson');
$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
OR  die('Підключення до бази данних не виконано помилка: ' .
        mysqli_connect_error());
?>