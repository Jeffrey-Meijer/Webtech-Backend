<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Users</title>
</head>
<body>
<div class="users">
    <?php foreach ($data["users"] as $user) : ?>
        <li><?= sprintf("%d => %s %s => %s", $user->uuid, $user->first_name, $user->last_name, $user->occupation) ?></li>
    <?php endforeach; ?>
</div>
</body>
</html>
