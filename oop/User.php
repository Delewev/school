<?php

namespace oop;

class User extends Database
{
    private $db;

    public function __construct(Database $database) {
        $this->db = $database->getConnection();
    }

    //  Создания нового пользователя
    public function createUser($username, $password) {
        // Хеширование пароля
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $this->db->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        return $stmt->execute([$username, $hashedPassword]);
    }

    public function authenticate($username, $password): bool
    {

        $stmt = $this->db->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            return true;
        }
        return false;
    }
}