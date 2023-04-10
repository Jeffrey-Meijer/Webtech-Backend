<?php

namespace Webtech\Connectors;

use PDO;
use ReflectionClass;
use Webtech\Connectors\Models;

class ORM {
    protected $dbh;
    protected $models;

    public function __construct(PDO $dbh, $models) {
        $this->dbh = $dbh;
        $this->models = $models;
    }

    public function insert($table, $data) {
        $keys = array_keys($data);
        $values = array_values($data);
        $placeholders = implode(',', array_fill(0, count($keys), '?'));

        $stmt = $this->dbh->prepare("INSERT INTO $table (" . implode(',', $keys) . ") VALUES ($placeholders)");

        foreach ($values as $i => $value) {
            $stmt->bindValue($i + 1, $value);
        }

        $stmt->execute();

        return $this->dbh->lastInsertId();
    }

    public function selectAll($table, $where, $value) {
        $query = "SELECT * FROM $table WHERE $where = ". $value;
//        var_dump($query);
        $stmt = $this->dbh->prepare($query);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        $objects = [];
        foreach ($rows as $row) {
//            var_dump($row);
            $objects[] = $row ? $this->mapToObject($row) : null;
//            var_dump($objects);
        }
        return $objects;
    }
    public function select($table, $where, $value) {
        $query = "SELECT * FROM $table WHERE $where = '$value'";
        $stmt = $this->dbh->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch();
        $object = $row ? $this->mapToObject($row) : null;
        return $object[0];
    }

    public function join($fromTable ,$table, $joinCondition, $where = null, $whereCondition=null) {

        $query = "SELECT * FROM " . $fromTable . " LEFT OUTER JOIN $table ON $joinCondition";
        if ($where != null && $whereCondition != null) $query .= " WHERE $where $whereCondition";
        var_dump($query);
        $stmt = $this->dbh->prepare($query);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $objects = [];
        foreach ($rows as $row) {
            $objects[] = $row ? $this->mapToObject($row) : null;
        }
        return $objects;

    }

    public function all($table) {
        $stmt = $this->dbh->prepare("SELECT * from $table");
        $stmt->execute();
        $rows = $stmt->fetchAll();
        $objects = [];
        foreach ($rows as $row) {
            $objects[] = $row ? $this->mapToObject($row) : null;
        }
        return $objects;
    }
    public function getModels() {
        return $this->models;
    }
    public function setModels($models) {
        $this->models = $models;
    }

//    protected function mapToObject($row) {
//        $objs = [];
//        foreach ($this->models as $model) {
//            $obj = $model;
//
//            foreach ($row as $key => $value) {
//                $obj->$key = $value;
//            }
//            $objs[] = $obj;
//        }
//        return $objs;
//    }

    protected function mapToObject($row) {
        $objs = [];
        foreach ($this->models as $model) {
            $obj = $model;

            foreach ($row as $key => $value) {
                $obj->$key = $value;

                // Call a method on the model if it exists for the given property
                $method = "get" . ucfirst(str_replace("_id", "", $key));
                if (method_exists($model, $method)) {
                    $obj->$method = $model->$method($this->dbh);
                }
            }
            $objs[] = $obj;
        }
        return $objs;
    }


}

