<?php

namespace Webtech\Connectors;

use PDO;

class ORM
{
    protected $dbh;
    protected $model;

    public function __construct(PDO $dbh, $model)
    {
        $this->dbh = $dbh;
        $this->model = $model;
    }

    public function insert($table, $data)
    {
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

    public function update($table, $data, $where)
    {
        $set = [];
        $values = [];

        foreach ($data as $key => $value) {
            $set[] = "$key = ?";
            $values[] = $value;
        }

        $whereClause = "";
        foreach ($where as $key => $value) {
            $whereClause .= "$key = ? AND ";
            $values[] = $value;
        }
        $whereClause = rtrim($whereClause, "AND ");

        $stmt = $this->dbh->prepare("UPDATE $table SET " . implode(', ', $set) . " WHERE $whereClause");

        foreach ($values as $i => $value) {
            $stmt->bindValue($i + 1, $value);
        }

        $stmt->execute();

        return $stmt->rowCount();
    }

    public function delete($table, $where)
    {
        $whereClause = "";
        $values = [];

        foreach ($where as $key => $value) {
            $whereClause .= "$key = ? AND ";
            $values[] = $value;
        }

        $whereClause = rtrim($whereClause, "AND ");

        $stmt = $this->dbh->prepare("DELETE FROM $table WHERE $whereClause");

        foreach ($values as $i => $value) {
            $stmt->bindValue($i + 1, $value);
        }

        $stmt->execute();

        return $stmt->rowCount();
    }


//    public function update($table, $where, $data) {
//        $keys = array_keys($data);
//        $values = array_values($data);
//        $placeholders = $implode(",", array_fill(0, count($keys), "?"));
//
//        $stmt = $this->dbh->prepare("UPDATE $table SET ". implode(",", $keys) . " ")
//    }

    public function selectAll($table, $where, $value)
    {
        $query = "SELECT * FROM $table WHERE $where = '$value'";
        $stmt = $this->dbh->prepare($query);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        $objects = [];
        foreach ($rows as $row) {
            $objects[] = $row ? $this->mapToObject($row) : null;
        }
        return $objects;
    }

//    public function selectAllWhereNot($table, $where, $value)
//    {
//
//    }
    public function selectNotExists($table, $where, $subquery)
    {
        $whereClause = "";
        $values = [];

        foreach ($where as $key => $value) {
            $whereClause .= "$key = ? AND ";
            $values[] = $value;
        }

        $whereClause = rtrim($whereClause, "AND ");


        $query = "SELECT * FROM $table WHERE NOT EXISTS ($subquery) $whereClause";

        $stmt = $this->dbh->prepare($query);

        foreach ($values as $i => $value) {
            $stmt->bindValue($i + 1, $value);
        }

        $stmt->execute();

        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $objects = [];
        foreach ($rows as $row) {
            $objects[] = $row ? $this->mapToObject($row) : null;
        }
        return $objects;
    }


    public function select($table, $where, $value)
    {
        $query = "SELECT * FROM $table WHERE $where = '$value'";
        $stmt = $this->dbh->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch();
        $object = $row ? $this->mapToObject($row) : null;
        return $object;
    }

    public function join($fromTable, $table, $joinCondition, $where = null, $whereCondition = null)
    {
        $query = "SELECT * FROM " . $fromTable . " LEFT OUTER JOIN $table ON $joinCondition";
        if ($where != null && $whereCondition != null) $query .= " WHERE $where = $whereCondition";
//        var_dump($query);
        $stmt = $this->dbh->prepare($query);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
//        var_dump($rows);
        $objects = [];
        foreach ($rows as $row) {
            $objects[] = $row ? $this->mapToObject($row) : null;
        }
        return $objects;
    }

    public function all($table)
    {
        $stmt = $this->dbh->prepare("SELECT * from $table");
        $stmt->execute();
        $rows = $stmt->fetchAll();
        $objects = [];
        foreach ($rows as $row) {
            $objects[] = $row ? $this->mapToObject($row) : null;
        }
        return $objects;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function setModel($model)
    {
        $this->model = $model;
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

//    protected function mapToObject($row) {
//        $objs = [];
//        foreach ($this->models as $model) {
//            $obj = $model;
//
//            foreach ($row as $key => $value) {
//                $obj->$key = $value;
//
//                // Call a method on the model if it exists for the given property
//                $method = "get" . ucfirst(str_replace("_id", "", $key));
//                if (method_exists($model, $method)) {
//                    $obj->$method = $model->$method($this->dbh);
//                }
//            }
//            $objs[] = $obj;
//        }
//        return $objs;
//    }
    protected function mapToObject($row)
    {
        $obj = clone $this->model;
        foreach ($row as $key => $value) {
            $obj->$key = $value;

            // Call a method on the model if it exists for the given property
            $method = "get" . ucfirst(str_replace("_id", "", $key));
            if (method_exists($obj, $method)) {
                $obj->$method = $obj->$method($this->dbh);
            }
        }
        return $obj;
    }

}

