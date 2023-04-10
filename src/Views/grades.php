<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Grades Page</title>
</head>
<body>
{{header}}
<div class="grades-page">
    <h1>Test</h1>
    <table>
        <thead>
            <th>Exam</th>
            <th>Grade</th>
        </thead>
        <tbody>
    <?php foreach ($data["grades"] as $grade) : ?>
<!--            --><?php //= sprintf("%s => exam: %d => grade: %s", $grade->user_id, $grade->exam_id, $grade->grade); ?>
        <td>
            <?= $grade->getExam->name ?>
        </td>
        <td>
            <?= $grade->grade?>
        </td>
    <?php endforeach; ?>
        </tbody>
    </table>
</div>
{{footer}}
</body>
</html>
