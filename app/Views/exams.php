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
    <?php
    foreach ($data["availableExams"] as $availableExam): ?>
        <li>
            <?= sprintf("%d => %s", $availableExam->id, $availableExam->name); ?>
            <form action="/exams" method="post">
                <input type="hidden" name="id" value="<?= $availableExam->id ?>">
                <input type="submit" value="Apply">
            </form>
        </li>
    <?php
    endforeach; ?>
</div>
{{footer}}
</body>
</html>
