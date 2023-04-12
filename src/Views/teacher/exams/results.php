<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin tools</title>
</head>
<body>
{{header}}
<div class="Admin-tools">
    <h1>Exams tool</h1>
    <div>
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
                        <form action="/teacher/exams/results/edit">
                            <input type="hidden" name="result" value="<?= $result->id ?>">
                            <input type="hidden" name="exam" value="<?= $result->exam_id ?>">
                            <input type="submit" value="Edit">
                        </form>
                    </td>
                </tr>
                <!--                <div>-->
                <!--                    --><?php
                //= $result->getUser->first_name ?>
                <!--                    --><?php
                //= $result->grade ?>
                <!--                --><?php
                //= $exam->name ?>
                <!--                </div>-->
                <!--                <form action="/teacher/exams/edit">-->
                <!--                    <input type="hidden" name="id" value="--><?php
                //= $exam->id ?><!--">-->
                <!--                    <input type="submit" value="Edit">-->
                <!--                </form>-->
            <?php
            endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
{{footer}}
</body>
</html>
