<?php

use PDO\Database;
use PDO\User;

session_start();
require 'Database.php';
require 'User.php';

$database = new Database();
$db = $database->connect();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = new User($db);
    if ($user->login($username, $password)) {
        $_SESSION['username'] = $username; // Сохранение информации о пользователе в сессии
        echo "Вы успешно вошли в систему!";
        // Можно перенаправить на главную страницу или страницу задач
        header("Location: tasks.php");
        exit();
    } else {
        echo "Ошибка входа. Проверьте имя пользователя и пароль.";
    }
}