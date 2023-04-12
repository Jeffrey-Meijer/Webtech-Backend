<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Teacher tools</title>
</head>
<body>
{{header}}
<div class="create-user">
    <h1>Editing <?= $data["result"]->getUser->first_name ?>'s <?= $data["result"]->getExam->name ?> result</h1>
    <form action="/teacher/exams/results/edit" method="post">
        <input type="hidden" name="id" value="<?= $data["result"]->id ?>">
        <input type="hidden" name="exam" value="<?= $data["result"]->exam_id ?>">
        <label for="grade">Grade:</label>
        <input id="grade" name="grade" type="number" step="0.1" max="10" value="<?= $data["result"]->grade ?>">
        <input id="submit" type="submit">
    </form>
</div>
{{footer}}
</body>
</html>
