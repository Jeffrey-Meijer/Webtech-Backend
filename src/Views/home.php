<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h1><?= $data["name"]?></h1>
<?php foreach ($data["films"] as $film) : ?>
    <li><?= $film["title"]?></li>
<?php endforeach; ?>
</body>
</html>
