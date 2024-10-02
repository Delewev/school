<?php

namespace oop;

class TaskManager extends Task
{
    private $user;
    private $task;

    public function __construct(User $user, Task $task)
    {
        $this->user = $user;
        $this->task = $task;
    }

    // Регистрации нового пользователя
    public function registerUser($username, $password)
    {
        return $this->user->createUser($username, $password);
    }

    // Аутентификация пользователя
    public function loginUser($username, $password) {
        return $this->user->authenticate($username, $password);
    }

    // Создания новой задачи
    public function addTask($title, $description, $userId) {
        return $this->task->createTask($title, $description, $userId);
    }

    // Получения задач пользователя
    public function listUserTasks($userId) {
        return $this->task->getUserTasks($userId);
    }
}