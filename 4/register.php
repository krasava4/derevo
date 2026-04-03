<?php
session_start();
require 'db.php';

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];

    if ($username === '' || $email === '' || $password === '' || $confirm === '') {
        $error = 'Заполни все поля';
    } elseif ($password !== $confirm) {
        $error = 'Пароли не совпадают';
    } else {
        $username = mysqli_real_escape_string($conn, $username);
        $email = mysqli_real_escape_string($conn, $email);
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        $check = mysqli_query($conn, "SELECT id FROM users WHERE username='$username' OR email='$email'");
        if (mysqli_num_rows($check) > 0) {
            $error = 'Такой логин или email уже существует';
        } else {
            $sql = "INSERT INTO users (username, email, password_hash, created_at) VALUES ('$username', '$email', '$password_hash', NOW())";
            if (mysqli_query($conn, $sql)) {
                $success = 'Регистрация успешна. Теперь можно войти.';
            } else {
                $error = 'Ошибка регистрации';
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
    <style>
        body { font-family: Arial, sans-serif; background:#f5f5f5; }
        .box { width: 320px; margin: 60px auto; background:#fff; padding:20px; border-radius:10px; box-shadow:0 0 10px rgba(0,0,0,.1); }
        input, button { width:100%; padding:10px; margin:8px 0; box-sizing:border-box; }
        button { background:#28a745; color:#fff; border:none; cursor:pointer; }
        a { color:#007bff; text-decoration:none; }
    </style>
</head>
<body>
<div class="box">
    <h2>Регистрация</h2>

    <?php if ($error) echo "<p style='color:red;'>$error</p>"; ?>
    <?php if ($success) echo "<p style='color:green;'>$success</p>"; ?>

    <form method="post">
        <input type="text" name="username" placeholder="Логин" value="<?php echo htmlspecialchars($_POST['username'] ?? ''); ?>">
        <input type="email" name="email" placeholder="Email" value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>">
        <input type="password" name="password" placeholder="Пароль">
        <input type="password" name="confirm" placeholder="Повторите пароль">
        <button type="submit">Зарегистрироваться</button>
    </form>

    <p>Уже есть аккаунт? <a href="login.php">Войти</a></p>
</div>
</body>
</html>