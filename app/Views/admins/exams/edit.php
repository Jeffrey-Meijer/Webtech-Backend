<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin tools</title>
    {{css}}
</head>
<body>
{{header}}
<div class="edit-exam container">
    <h1>Editing <?= $data["exam"]->name ?></h1>
    <form action="/admin/exams/edit" method="post">
        <input id="id" name="id" type="hidden" value="<?= $data["exam"]->id ?>">
        <div class="form-group">
            <label for="name">Name:</label>
            <input class="form-control" id="name" name="name" type="text" value="<?= $data["exam"]->name ?>">
        </div>
        <div class="form-group">
            <label for="teacher">Teacher:</label>
            <select class="form-control" id="teacher" name="teacher_id" value="<?= $data["exam"]->teacher_id ?>">
                <?php
                foreach ($data["teachers"] as $teacher): ?>
                    <option value="<?= $teacher->uuid ?>"><?= $teacher->first_name ?></option>
                <?php
                endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <button class="btn btn-primary" id="submit" type="submit">Edit</button>
        </div>
    </form>
</div>
{{footer}}
</body>
</html>
