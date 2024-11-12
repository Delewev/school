<?php
use Controller\UserController;

require_once '../config/database.php';

$url = isset($_GET['url']) ? $_GET['url'] : '';

$userController = new UserController($pdo);
if ($url === 'create') {
    $userController->create();
} elseif (preg_match('/^delete/(d+)$/', $url, $matches)) {
    $userController->delete($matches[1]);
} else {
    $userController->index();
}
