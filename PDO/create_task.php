<?php

use PDO\Database;
use PDO\Task;

require 'Database.php';
require 'Task.php';

$database = new Database();
$db = $database->connect();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $task_title = $_POST['task_title'];
    $task_description = $_POST['task_description'];
    $user_id = $_POST['user_id'];

    $task = new Task($db);
    if ($task->create($task_title, $task_description, $user_id)) {
        echo "Задача успешно создана!";
    } else {
        echo "Ошибка при создании задачи.";
    }
}