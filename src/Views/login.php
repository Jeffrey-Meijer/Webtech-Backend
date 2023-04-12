<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
</head>
<body>
{{header}}
<div class="login-page">
    <?php
    if (!isset($_SESSION["logged_in"])): ?>
        <form action="/login" method="post">
            <label for="email">Email:</label>
            <input id="email" name="email" type="email">
            <label for="password">Password:</label>
            <input id="password" name="password" type="password">
            <input id="submit" type="submit">
        </form>
        <a href="/register">Register</a>
    <?php
    else: ?>
        <h1>Je bent al ingelogd!</h1>
    <?php
    endif; ?>
</div>
{{footer}}
</body>
</html>
