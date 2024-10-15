<?php

namespace patterns;

use oop\Database;
use oop\Task;
use oop\TaskManager;
use oop\User;

class Factory
{
    private $host;
    private $db;
    private $user;
    private $pass;
    private $charset;

    public function __construct($host, $db, $user, $pass, $charset = 'utf8mb4')
    {
        $this->host = $host;
        $this->db = $db;
        $this->user = $user;
        $this->pass = $pass;
        $this->charset = $charset;
    }

    public function createDatabase(): Database
    {
        return new Database($this->host, $this->db, $this->user, $this->pass, $this->charset);
    }

    public function createUser(Database $database): User
    {
        return new User($database);
    }

    public function createTask(Database $database): Task
    {
        return new Task($database);
    }

    public function createTaskManager(User $user, Task $task): TaskManager
    {
        return new TaskManager($user, $task);

    }
}
$factory = new Factory('localhost', 'your_db', 'your_user', 'your_pass');

// Создаем объект базы данных
$database = $factory->createDatabase();

// Создаем пользователя и задачи
$user = $factory->createUser($database);
$task = $factory->createTask($database);

// Создаем менеджер задач
$taskManager = $factory->createTaskManager($user, $task);

// Пример регистрации пользователя и создания задачи
$user->createUser('username', 'password');
$task->createTask('Заголовок задачи', 'Описание задачи', '1');

// Пример назначения задачи пользователю
$taskManager->listUserTasks(1, 1);
