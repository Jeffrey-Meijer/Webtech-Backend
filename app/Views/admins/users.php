<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin tools</title>
    {{css}}
</head>
<body>
{{header}}
<div class="Admin-tools">
    <h1>Users tool</h1>
    <div style="display: grid; grid-template-columns: 1fr 1fr">
        <?php
        foreach ($data["users"] as $user) : ?>
            <li>
                <?= $user->uuid ?>
                <?= $user->first_name ?>
                <form action="/admin/users/edit">
                    <input type="hidden" name="uuid" value="<?= $user->uuid ?>">
                    <input type="submit" value="Edit">
                </form>
                <form action="/admin/users/delete" method="post">
                    <input type="hidden" name="uuid" value="<?= $user->uuid ?>">
                    <input type="submit" value="Delete">
                </form>
            </li>
        <?php
        endforeach; ?>
    </div>
    <h1>Create new user</h1>
    <a href="/admin/users/create">Create new user</a>
</div>
{{footer}}
</body>
</html>
