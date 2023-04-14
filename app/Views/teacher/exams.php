<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Teacher tools</title>
    {{css}}
</head>
<body>
{{header}}
<div class="teacher-tools container">
    <table class="table">
        <thead>
        <th>ID</th>
        <th>Name</th>
        <th>Actions</th>
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
                    <form action="/teacher/exams/results">
                        <input type="hidden" name="exam" value="<?= $exam->id ?>">
                        <input type="hidden" name="user">
                        <button class="btn btn-primary" type="submit" value="See results">See results</button>
                    </form>
                </td>
            </tr>
        <?php
        endforeach; ?>
        </tbody>
    </table>
</div>
{{footer}}
</body>
</html>
