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
    <h1>Exams tool</h1>
    <div style="display: grid; grid-template-columns: 1fr 1fr">
        <?php
        foreach ($data["exams"] as $exam) : ?>
            <li>
                <?= $exam->id ?>
                <?= $exam->name ?>
                <form action="/admin/exams/edit">
                    <input type="hidden" name="id" value="<?= $exam->id ?>">
                    <input type="submit" value="Edit">
                </form>
                <form action="/admin/exams/delete" method="post">
                    <input type="hidden" name="id" value="<?= $exam->id ?>">
                    <input type="submit" value="Delete">
                </form>
            </li>
        <?php
        endforeach; ?>
    </div>
    <h1>Create new exam</h1>
    <a href="/admin/exams/create">Create new exam</a>
</div>
{{footer}}
</body>
</html>
