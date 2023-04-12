<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin tools</title>
</head>
<body>
{{header}}
<div class="edit-user">
    <h1>Editing <?= $data["user"]->first_name ?></h1>
    <form action="/admin/users/edit" method="post">
        <input id="olduuid" name="olduuid" type="hidden" value="<?= $data["user"]->uuid ?>">
        <label for="uuid">UUID:</label>
        <input id="uuid" name="uuid" type="number" value="<?= $data["user"]->uuid ?>">
        <label for="first_name">First name:</label>
        <input id="first_name" name="first_name" type="text" value="<?= $data["user"]->first_name ?>">
        <label for="last_name">Last Name:</label>
        <input id="last_name" name="last_name" type="text" value="<?= $data["user"]->last_name ?>">
        <label for="email">Email:</label>
        <input id="email" name="email" type="email" value="<?= $data["user"]->email ?>">
        <label for="password">Password:</label>
        <input id="password" name="password" type="password">
        <label for="occupation">Occupation:</label>
        <select id="occupation" name="occupation" value="<?= $data["user"]->occupation ?>">
            <option>Student</option>
            <option>Teacher</option>
            <option>Administrator</option>
        </select>
        <input id="submit" type="submit">
    </form>
</div>
{{footer}}
</body>
</html>
