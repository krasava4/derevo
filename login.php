<?php
session_start();
include 'users.php';

if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: login.php'); exit;
}

if (!isset($_SESSION['logged_in'])) {
    // Форма входа
    if ($_POST) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        if (isset($users[$username]) && $users[$username] === $password) {
            $_SESSION['username'] = $username;
            $_SESSION['logged_in'] = true;
            header('Location: login.php'); exit;
        } else {
            $error = 'Неверный логин/пароль';
        }
    }
    ?>
    <!DOCTYPE html>
    <html><body>
    <h2>Вход</h2>
    <?php if(isset($error)) echo "<p style='color:red'>$error</p>"; ?>
    <form method=POST>
    Логин: <input name=username><br>
    Пароль: <input name=password type=password><br>
    <button>Войти</button>
    </form>
    <p>Пример: admin / 12345</p>
    </body></html>
    <?php
    exit;
}

// Если авторизован — показываем контент
echo "<h2>Привет, {$_SESSION['username']}! Это защищённая страница рецептов.</h2>";
echo "<a href='?logout=1'>Выход</a><br>";
echo "<a href='recipes.php'>Рецепты</a>";  // твои страницы
?>
