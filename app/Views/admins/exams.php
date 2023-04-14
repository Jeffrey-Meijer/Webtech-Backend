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
    <h1>Exams</h1>
    <table class="table">
        <thead>
        <th>Exam ID</th>
        <th>Exam</th>
        <th>Action</th>
        </thead>
        <tbody>
        <?php
        foreach ($data["exams"] as $exam) : ?>
            <tr>
                <td>
                    <?= $exam->id ?>
                </td>
                <td>
                    <?= $exam->name ?>
                </td>
                <td>
                    <form action="/admin/exams/edit">
                        <div class="form-group">
                            <input type="hidden" name="id" value="<?= $exam->id ?>">
                            <button type="submit" class="btn btn-primary form-control">Edit</button>
                        </div>
                    </form>
                    <form action="/admin/exams/delete" method="post">
                        <div class="form-group">
                            <input type="hidden" name="id" value="<?= $exam->id ?>">
                            <button type="submit" class="btn btn-danger form-control">Delete</button>
                        </div>
                    </form>
                </td>
            </tr>
        <?php
        endforeach; ?>
        </tbody>
    </table>
    <h1>Create new exam</h1>
    <a role="button" class="btn btn-primary" href="/admin/exams/create">Create new exam</a>
</div>
{{footer}}
</body>
</html>
