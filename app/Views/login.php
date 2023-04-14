<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    {{css}}
</head>
<body>
{{header}}
<div class="login-page container">
    <?php
    if (!isset($_SESSION["logged_in"])): ?>
        <form action="/login" method="post">
            <div class="form-group">
                <label for="email">Email:</label>
                <input class="form-control" required id="email" name="email" type="email">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input class="form-control" required id="password" name="password" type="password">
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
            <a class="btn btn-primary" type="button" href="/register">Register</a>
            <!--            <input id="submit" type="submit">-->
        </form>
        <!--        <a href="/register">Register</a>-->
    <?php
    else: ?>
        <h1>Je bent al ingelogd!</h1>
    <?php
    endif; ?>
</div>
{{footer}}
</body>
</html>
