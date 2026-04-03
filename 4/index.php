<?php
require 'auth.php';
require 'db.php';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Главная</title>
</head>
<body>
<h1>Привет, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
<p>Ты вошёл в систему.</p>
<a href="logout.php">Выйти</a>
</body>
</html>