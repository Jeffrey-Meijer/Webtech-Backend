<?php

namespace Webtech\Connectors\Models;

class User {
    public string $table = 'users';
    public int $id;
    public int $uuid;
    public string $first_name;
    public string $last_name;
    public string $password;
    public string $email;
    public string $occupation;


    public string $name;

}
