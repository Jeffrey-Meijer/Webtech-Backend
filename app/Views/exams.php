<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Exams</title>
    {{css}}
</head>
<body>
{{header}}
<div class="exams container">
    <h1>Available exams</h1>
    <table class="table">
        <thead>
        <th>ID</th>
        <th>Exam</th>
        <th>Actions</th>
        </thead>
        <tbody>
        <?php
        foreach ($data["availableExams"] as $availableExam): ?>
            <tr>
                <td>
                    <?= $availableExam->id ?>
                </td>
                <td>
                    <?= $availableExam->name ?>
                </td>
                <td>
                    <form action="/exams" method="post">
                        <input type="hidden" name="id" value="<?= $availableExam->id ?>">
                        <button class="btn btn-primary" type="submit">Apply</button>
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
