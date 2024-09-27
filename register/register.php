<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $firstName = trim(isset($_POST['first_name']));
    $lastName = trim(isset($_POST['last_name']));
    $email = (isset($_POST['email']));
    $password = (isset($_POST['password']));
    $confirmPassword = (isset($_POST['confirm_password']));

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