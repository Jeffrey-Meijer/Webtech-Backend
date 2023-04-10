<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Exams</title>
</head>
<body>
{{header}}
<div class="exams">
<!--    --><?php //foreach ($data["availableExams"] as $availableExam) : ?>
<!--        <li>--><?php //= sprintf("%d => %s %s", $availableExam->id, $availableExam->name, $availableExam->teacher_id) ?><!-- <button onclick="applyForExam()">Apply</button></li>-->
<!--    --><?php //endforeach; ?>
    <?php foreach ($data["availableExams"] as $availableExam): ?>
<!--        --><?php //= sprintf("%d => %s %s, %s", $availableExam->id, $availableExam->user_id, $availableExam->exam_id, $availableExam->grade) ?>
    <?= sprintf("%d => %s %s", $availableExam->id, $availableExam->name, $availableExam->teacher_id); ?> <button onclick="handleExam()">Apply</button>
    <?php endforeach; ?>
</div>
{{footer}}
</body>

<script>
    async function handleExam() {
        const response = await fetch("/exams/available", {
            method: "POST",
            body: {exam_id: 1}
        });
        console.log(response);
        console.log("applied for exam!");

    }
</script>
</html>
