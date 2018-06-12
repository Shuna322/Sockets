<?php
DEFINE('DB_USER', 'sockets');
DEFINE('DB_PASSWORD', 'W7p9J5f6');
DEFINE('DB_HOST', 'localhost');
DEFINE('DB_NAME', 'sockets');

$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
OR  die('Підключення до бази данних не виконано помилка: ' .
        mysqli_connect_error());
