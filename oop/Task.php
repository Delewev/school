<?php

namespace oop;

class Task extends Database
{
    private $db;

    public function __construct(Database $database) {
        $this->db = $database->getConnection();
    }

    // Создания новой задачи
    public function createTask($title, $description, $userId) {
        // SQL запрос для вставки новой задачи
        $stmt = $this->db->prepare("INSERT INTO tasks (title, description, user_id) VALUES (?, ?, ?)");
        return $stmt->execute([$title, $description, $userId]);
    }

    // Получения всех задач пользователя
    public function getUserTasks($userId) {
        // SQL запрос для получения задач пользователя
        $stmt = $this->db->prepare("SELECT * FROM tasks WHERE user_id = ?");
        $stmt->execute([$userId]);
        return $stmt->fetchAll();
    }

    // Обновления статуса задачи
    public function updateTaskStatus($taskId, $status) {
        $stmt = $this->db->prepare("UPDATE tasks SET status = ? WHERE id = ?");
        return $stmt->execute([$status, $taskId]);
    }
}