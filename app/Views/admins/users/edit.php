<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin tools</title>
    {{css}}
</head>
<body>
{{header}}
<div class="edit-user container">
    <h1>Editing <?= $data["user"]->first_name ?></h1>
    <form action="/admin/users/edit" method="post">
        <input id="olduuid" name="olduuid" type="hidden" value="<?= $data["user"]->uuid ?>">
        <div class="form-group">
            <div class="form-row">
                <div class="col">
                    <label for="uuid">UUID:</label>
                    <input class="form-control" id="uuid" name="uuid" type="number" value="<?= $data["user"]->uuid ?>">
                </div>
                <div class="col">
                    <label for="first_name">First name:</label>
                    <input class="form-control" id="first_name" name="first_name" type="text"
                           value="<?= $data["user"]->first_name ?>">
                </div>
                <div class="col">
                    <label for="last_name">Last Name:</label>
                    <input class="form-control" id="last_name" name="last_name" type="text"
                           value="<?= $data["user"]->last_name ?>">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="form-row">
                <div class="col">
                    <label for="email">Email:</label>
                    <input class="form-control" id="email" name="email" type="email"
                           value="<?= $data["user"]->email ?>">
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
                    <select class="form-control" id="occupation" name="occupation"
                            value="<?= $data["user"]->occupation ?>">
                        <option value="Student">Student</option>
                        <option value="Teacher">Teacher</option>
                        <option value="Administrator">Administrator</option>
                    </select>
                </div>
            </div>
        </div>
        <button class="btn btn-primary" id="submit" type="submit">Edit user</button>
    </form>
</div>
{{footer}}
</body>
</html>
