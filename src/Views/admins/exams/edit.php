<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin tools</title>
</head>
<body>
{{header}}
<div class="edit-exam">
    <h1>Editing <?= $data["exam"]->name ?></h1>
<form action="/admin/exams/edit" method="post">
    <input id="id" name="id" type="hidden" value="<?= $data["exam"]->id ?>">
    <label for="name">Name:</label>
    <input id="name" name="name" type="text" value="<?= $data["exam"]->name ?>">
    <label for="teacher">Occupation:</label>
    <select id="teacher" name="teacher_id" value="<?= $data["exam"]->teacher_id ?>">
        <?php foreach ($data["teachers"] as $teacher): ?>
            <option value="<?= $teacher->uuid ?>"><?= $teacher->first_name ?></option>
        <?php endforeach; ?>
    </select>
    <input id="submit" type="submit">
</form>
</div>
{{footer}}
</body>
</html>
