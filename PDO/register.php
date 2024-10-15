<?php

use PDO\Database;
use PDO\User;

require 'Database.php';
require 'User.php';

$database = new Database();
$db = $database->connect();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = new User($db);
    if ($user->register($username, $password)) {
        echo "Регистрация успешна!";
    } else {
        echo "Ошибка регистрации.";
    }
}