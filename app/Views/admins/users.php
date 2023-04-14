<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin tools</title>
    {{css}}
</head>
<body>
{{header}}
<div class="admin-tools container">
    <h1>Users tool</h1>
    <table class="table">
        <thead>
        <th>UUID</th>
        <th>Name</th>
        <th>Actions</th>
        </thead>
        <tbody>
        <?php
        foreach ($data["users"] as $user) : ?>
            <tr>
                <td>
                    <?= $user->uuid ?>
                </td>
                <td>
                    <?= $user->first_name ?>
                </td>
                <td>
                    <form action="/admin/users/edit">
                        <div class="form-group">
                            <input type="hidden" name="uuid" value="<?= $user->uuid ?>">
                            <button class="btn btn-primary form-control" type="submit">Edit</button>
                        </div>
                    </form>
                    <form action="/admin/users/delete" method="post">
                        <div class="form-group">
                            <input type="hidden" name="uuid" value="<?= $user->uuid ?>">
                            <button class="btn btn-danger form-control" type="submit">Delete</button>
                        </div>
                    </form>
                </td>
            </tr>
        <?php
        endforeach; ?>
        </tbody>
    </table>
    <h1>Create new user</h1>
    <a role="button" class="btn btn-primary" href="/admin/users/create">Create new user</a>
</div>
{{footer}}
</body>
</html>
