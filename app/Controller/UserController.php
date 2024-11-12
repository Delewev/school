<?php

namespace Controller;

use User;

require_once '../../config/database.php';

class UserController {
    private $userModel;

    public function __construct($pdo) {
        $this->userModel = new User($pdo);
    }

    public function index() {
        $users = $this->userModel->getAllUsers();
        require '../views/user_list.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $this->userModel->createUser($name, $email);
            header('Location: /');
        } else {
            require '../views/user_create.php';
        }
    }

    public function delete($id) {
        $this->userModel->deleteUser($id);
        header('Location: /');
    }
}