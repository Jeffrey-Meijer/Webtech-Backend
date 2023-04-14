<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Teacher tools</title>
    {{css}}
</head>
<body>
{{header}}
<div class="create-user container">
    <h1>Editing <?= $data["result"]->getUser->first_name ?>'s <?= $data["result"]->getExam->name ?> result</h1>
    <form action="/teacher/exams/results/edit" method="post">
        <input type="hidden" name="id" value="<?= $data["result"]->id ?>">
        <input type="hidden" name="exam" value="<?= $data["result"]->exam_id ?>">
        <div class="form-group">
            <label for="grade">Grade:</label>
            <input class="form-control" id="grade" name="grade" type="number" step="0.1" min="1" max="10"
                   value="<?= $data["result"]->grade ?>">
        </div>
        <div class="form-group">
            <button class="btn btn-primary form-control" id="submit" type="submit">Submit</button>
        </div>
    </form>
</div>
{{footer}}
</body>
</html>
