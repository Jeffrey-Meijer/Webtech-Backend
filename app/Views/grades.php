<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Grades Page</title>
    {{css}}
</head>
<body>
{{header}}
<div class="grades-page container">
    <h1>Test</h1>
    <table>
        <thead>
        <th>Exam</th>
        <th>Grade</th>
        </thead>
        <tbody>
        <?php
        foreach ($data["grades"] as $grade) : ?>
            <tr>
                <td>
                    <?= $grade->getExam->name ?>
                </td>
                <td>
                    <?= $grade->grade ?? "None" ?>
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
