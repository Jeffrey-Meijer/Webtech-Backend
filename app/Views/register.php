<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration Page</title>
    {{css}}
</head>
<body>
{{header}}
<div class="registration-page">
    <form action="/register" method="post">
        <label for="uuid">UUID:</label>
        <input id="uuid" name="uuid" type="number">
        <label for="first_name">First name:</label>
        <input id="first_name" name="first_name" type="text">
        <label for="last_name">Last Name:</label>
        <input id="last_name" name="last_name" type="text">
        <label for="email">Email:</label>
        <input id="email" name="email" type="email">
        <label for="password">Password:</label>
        <input id="password" name="password" type="password">
        <label for="occupation">Occupation:</label>
        <select id="occupation" name="occupation">
            <option>Student</option>
            <option>Teacher</option>
            <option>Administrator</option>
        </select>
        <input id="submit" type="submit">
    </form>
</div>
{{footer}}
</body>
</html>
