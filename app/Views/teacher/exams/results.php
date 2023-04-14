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
    <div class="container">
        <h1>Exams tool</h1>
        <table class="table">
            <thead>
            <th>Exam</th>
            <th>Grade</th>
            <th>Actions</th>
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
                        <form action="/teacher/exams/results/edit">
                            <div class="form-group">
                                <input type="hidden" name="result" value="<?= $result->id ?>">
                                <input type="hidden" name="exam" value="<?= $result->exam_id ?>">
                                <button class="btn btn-primary" type="submit">Edit</button>
                            </div>
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
