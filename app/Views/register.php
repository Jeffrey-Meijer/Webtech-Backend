<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration Page</title>
    {{css}}
</head>
<body>
{{header}}
<div class="registration-page container">
    <form action="/register" method="post">
        <div class="form-row">
            <div class="form-group col">
                <label for="first_name">First name:</label>
                <input class="form-control" required id="first_name" name="first_name" type="text">
            </div>
            <div class="form-group col">
                <label for="last_name">Last Name:</label>
                <input class="form-control" required id="last_name" name="last_name" type="text">
            </div>
            <div class="form-group col">
                <label for="uuid">UUID:</label>
                <input class="form-control" required id="uuid" name="uuid" type="number">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col">
                <label for="email">Email:</label>
                <input class="form-control" required id="email" name="email" type="email">
            </div>
            <div class="form-group col">
                <label for="password">Password:</label>
                <input class="form-control" required id="password" name="password" type="password">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col">
                <label for="occupation">Occupation:</label>
                <select class="form-control" id="occupation" name="occupation">
                    <option>Student</option>
                    <option>Teacher</option>
                    <option>Administrator</option>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
</div>
{{footer}}
</body>
</html>
