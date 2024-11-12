<!DOCTYPE html>
<html>
<head>
    <title>User List</title>
</head>
<body>
    <h1>User List</h1>
    <a href="/create">Create User</a>
    <ul>
        <?php foreach ($users as $user): ?>
            <li>
                <?= htmlspecialchars($user['name']) ?> (<?= htmlspecialchars($user['email']) ?>)
                <a href="/delete/<?= $user['id'] ?>">Delete</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>