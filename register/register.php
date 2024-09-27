<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $firstName = htmlspecialchars(trim($_POST['first_name']));
    $lastName = htmlspecialchars(trim($_POST['last_name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['password']));
    $confirmPassword = htmlspecialchars(trim($_POST['confirm_password']));

    // Проверка на совпадение паролей
    if ($password !== $confirmPassword) {
        echo "Пароли не совпадают.";
        exit;
    }else{
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    }

    echo "Регистрация прошла успешно. Добро пожаловать, $firstName!";
} else {
    echo "Некорректный запрос.";
}