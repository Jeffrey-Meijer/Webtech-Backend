<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin tools</title>
    {{css}}
</head>
<body>
{{header}}
<div class="create-user container">
    <h1>Create new user</h1>
    <form action="/admin/users/create" method="post">
        <div class="form-group">
            <div class="form-row">
                <div class="col">
                    <label for="uuid">UUID:</label>
                    <input class="form-control" id="uuid" name="uuid" type="number">
                </div>
                <div class="col">
                    <label for="first_name">First name:</label>
                    <input class="form-control" id="first_name" name="first_name" type="text">
                </div>
                <div class="col">
                    <label for="last_name">Last Name:</label>
                    <input class="form-control" id="last_name" name="last_name" type="text">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="form-row">
                <div class="col">
                    <label for="email">Email:</label>
                    <input class="form-control" id="email" name="email" type="email">
                </div>
                <div class="col">
                    <label for="password">Password:</label>
                    <input class="form-control" id="password" name="password" type="password">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="form-row">
                <div class="col">
                    <label for="occupation">Occupation:</label>
                    <select class="form-control" id="occupation" name="occupation">
                        <option>Student</option>
                        <option>Teacher</option>
                        <option>Administrator</option>
                    </select>
                </div>
            </div>
        </div>
        <button class="btn btn-primary form-control" id="submit" type="submit">Create user</button>
    </form>
</div>
{{footer}}
</body>
</html>
