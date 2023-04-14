<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin tools</title>
    <link rel="stylesheet" href="/app/Assets/css/bootstrap.css">
    {{css}}
</head>
<body>
{{header}}
<div class="admin-tools container">
    <div class="row d-flex justify-content-around">
        <div class="card col-4 text-center">
            <a href="/admin/users">
                <div class="card-body">
                    <h1 class="card-title">Users</h1>
                    <p class="card-text">Manage Users</p>
                </div>
            </a>
        </div>
        <div class="card col-4 text-center">
            <a href="/admin/exams">
                <div class="card-body">
                    <h1 class="card-title">Exams</h1>
                    <p class="card-text">Manage Exams</p>
                </div>
            </a>
        </div>
    </div>
</div>
{{footer}}
</body>
</html>
