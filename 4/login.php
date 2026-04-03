<?php
session_start();
require 'db.php';

$error = '';

if (isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    $username = mysqli_real_escape_string($conn, $username);
    $result = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' LIMIT 1");

    if ($row = mysqli_fetch_assoc($result)) {
        if (password_verify($password, $row['password_hash'])) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            header('Location: index.php');
            exit;
        } else {
            $error = 'Неверный пароль';
        }
    } else {
        $error = 'Пользователь не найден';
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Вход</title>
    <style>
        body { font-family: Arial, sans-serif; background:#f5f5f5; }
        .box { width: 320px; margin: 60px auto; background:#fff; padding:20px; border-radius:10px; box-shadow:0 0 10px rgba(0,0,0,.1); }
        input, button { width:100%; padding:10px; margin:8px 0; box-sizing:border-box; }
        button { background:#007bff; color:#fff; border:none; cursor:pointer; }
        a { color:#007bff; text-decoration:none; }
    </style>
</head>
<body>
<div class="box">
    <h2>Вход</h2>

    <?php if ($error) echo "<p style='color:red;'>$error</p>"; ?>

    <form method="post">
        <input type="text" name="username" placeholder="Логин">
        <input type="password" name="password" placeholder="Пароль">
        <button type="submit">Войти</button>
    </form>

    <p>Нет аккаунта? <a href="register.php">Регистрация</a></p>
</div>
</body>
</html>