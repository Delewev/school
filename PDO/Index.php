<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Менеджер задач</title>
</head>
<body>

<h2>Регистрация</h2>
<form action="register.php" method="POST">
    <label for="username">Имя пользователя:</label>
    <input type="text" id="username" name="username" required>
    <br>
    <label for="password">Пароль:</label>
    <input type="password" id="password" name="password" required>
    <br>
    <input type="submit" value="Зарегистрироваться">
</form>

<h2>Авторизация</h2>
<form action="login.php" method="POST">
    <label for="login_username">Имя пользователя:</label>
    <input type="text" id="login_username" name="username" required>
    <br>
    <label for="login_password">Пароль:</label>
    <input type="password" id="login_password" name="password" required>
    <br>
    <input type="submit" value="Войти">
</form>

<h2>Создание задачи</h2>
<form action="create_task.php" method="POST">
    <label for="task_title">Название задачи:</label>
    <input type="text" id="task_title" name="task_title" required>
    <br>
    <label for="task_description">Описание задачи:</label>
    <textarea id="task_description" name="task_description" required></textarea>
    <br>
    <label for="user_id">ID пользователя:</label>
    <input type="number" id="user_id" name="user_id" required>
    <br>
    <input type="submit" value="Создать задачу">
</form>

</body>
</html>