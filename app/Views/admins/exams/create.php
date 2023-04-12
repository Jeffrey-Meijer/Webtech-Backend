<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin tools</title>
    {{css}}
</head>
<body>
{{header}}
<div class="create-exam">
    <h1>Create new exam</h1>
    <form action="/admin/exams/create" method="post">
        <label for="name">Name:</label>
        <input id="name" name="name" type="text">
        <label for="teacher">Teacher:</label>
        <select id="teacher" name="teacher_id">
            <?php
            foreach ($data["teachers"] as $teacher): ?>
                <option value="<?= $teacher->uuid ?>"><?= $teacher->first_name ?></option>
            <?php
            endforeach; ?>
        </select>
        <input id="submit" type="submit">
    </form>
</div>
{{footer}}
</body>
</html>
