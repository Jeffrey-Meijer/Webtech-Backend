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
    <div style="display: grid; grid-template-columns: 1fr 1fr">
        <?php foreach ($data["exams"] as $exam) : ?>
            <div>
                <?= $exam->id ?>
                <?= $exam->name ?>
                <form action="/teacher/exams/results" method="post">
                    <input type="hidden" name="exam" value="<?= $exam->id ?>">
                    <input type="hidden" name="user">
                    <input type="submit" value="See results">
                </form>
            </div>
        <?php endforeach; ?>
    </div>
</div>
{{footer}}
</body>
</html>
