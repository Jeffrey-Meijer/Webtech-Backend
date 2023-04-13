<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Teacher tools</title>
    {{css}}
</head>
<body>
{{header}}
<div class="teacher-tools">
    <h1>Exams tool</h1>
    <div class="container">
        <table>
            <thead>
            <th>Exam</th>
            <th>Grade</th>
            <th></th>
            </thead>
            <tbody>
            <?php
            foreach ($data["results"] as $result) : ?>
                <tr>
                    <td>
                        <?= $result->getUser->first_name ?>
                    </td>
                    <td>
                        <?= $result->grade ?? "None" ?>
                    </td>
                    <td>
                        <form action="/teacher/exams/results/edit" method="post">
                            <input type="hidden" name="result" value="<?= $result->id ?>">
                            <input type="hidden" name="exam" value="<?= $result->exam_id ?>">
                            <input type="submit" value="Edit">
                        </form>
                    </td>
                </tr>
            <?php
            endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
{{footer}}
</body>
</html>
