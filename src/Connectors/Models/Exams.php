<?php

namespace Webtech\Connectors\Models;

class Exams extends Generic
{
    public string $table = "exams";
    public int $id;
    public string $name;
    public int $teacher_id;
}
