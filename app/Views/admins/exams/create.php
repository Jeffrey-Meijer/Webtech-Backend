<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin tools</title>
    {{css}}
</head>
<body>
{{header}}
<div class="create-exam container">
    <h1>Create new exam</h1>
    <form action="/admin/exams/create" method="post">
        <div class="form-group">
            <div class="form-row">
                <div class="col">
                    <label for="name">Name:</label>
                    <input class="form-control" id="name" name="name" type="text">
                </div>
                <div class="col">
                    <label for="teacher">Teacher:</label>
                    <select class="form-control" id="teacher" name="teacher_id">
                        <?php
                        foreach ($data["teachers"] as $teacher): ?>
                            <option value="<?= $teacher->uuid ?>"><?= $teacher->first_name ?></option>
                        <?php
                        endforeach; ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="form-row">
                <div class="col">
                    <button class="btn btn-primary form-control" id="submit" type="submit">Create exam</button>
                </div>
            </div>
        </div>
    </form>
</div>
{{footer}}
</body>
</html>
