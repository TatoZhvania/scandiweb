<?php

class QueryBuilder
{

    protected $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function selectAll($table)
    {
        $statement = $this->pdo->prepare("select * from {$table}");

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS);
    }

    public function insert($table, $parameters)
    {
        $columns = implode(', ', array_keys($parameters));
        $values = ':' . implode(', :', array_keys($parameters));

        $sql = "INSERT INTO $table ($columns) VALUES ($values)";

        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute($parameters);
        } catch (Exception $e) {
            die("Whoops, something went wrong: " . $e->getMessage());
        }
    }

    public function delete($table, $id)
    {
        $statement = $this->pdo->prepare("DELETE FROM {$table} WHERE id = :id");

        try {
            $statement->execute(['id' => $id]);
        } catch (Exception $e) {
            die("Whoops, something went wrong: " . $e->getMessage());
        }
    }


    public function selectByColumn($table, $column, $value)
    {
        $statement = $this->pdo->prepare("SELECT * FROM {$table} WHERE {$column} = :value");
        $statement->execute(['value' => $value]);
        return $statement->fetchAll(PDO::FETCH_CLASS);
    }
}
