<?php
$host = '127.0.0.1';
$user = 'root';
$pass = '';
$dbname = 'vkusny_dom';

$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
    die('Ошибка подключения: ' . mysqli_connect_error());
}

mysqli_set_charset($conn, 'utf8mb4');
?>