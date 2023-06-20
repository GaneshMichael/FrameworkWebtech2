<?php

namespace app\App\core\Database;

use app\App\core\Model;
use PDO;
use PDOException;
use app\App\core\Database;

class DatabaseModel extends Model
{
    public static PDO $connection;
    public Database $Database;

    public function __construct()
    {
        $this->Database = new Database();
        self::$connection = $this->Database->pdo;
    }

    public static function count($table, $condition = '', $params = [])
    {
        try {
            $sql = "SELECT COUNT(*) FROM $table";
            if (!empty($condition)) {
                $sql .= " WHERE $condition";
            }

            $statement = self::$connection->prepare($sql);
            $statement->execute($params);

            return $statement->fetchColumn();
        } catch (PDOException $e) {
            die('Error executing database query: ' . $e->getMessage());
        }
    }

    public function insert($table, $columns, $values)
    {
        try {
            $columnString = implode(', ', $columns);
            $valuePlaceholder = implode(', ', array_fill(0, count($values), '?'));

            $sql = "INSERT INTO $table ($columnString) VALUES ($valuePlaceholder)";
            $statement = self::$connection->prepare($sql);
            $statement->execute($values);

            return $this->getLastInsertId();
        } catch (PDOException $e) {
            die('Execution failed: ' . $e->getMessage());
        }
    }

    public function loadData($data): void
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
    }
    public static function findOne(array $conditions): ?array
    {
        $tableName = static::tableName();
        $query = "SELECT * FROM `$tableName` WHERE ";
        $params = [];

        foreach ($conditions as $column => $value) {
            $query .= "`$column` = ? AND ";
            $params[] = $value;
        }

        $query = rtrim($query, "AND ");
        var_dump($query);

        $statement = self::$connection->prepare($query);
        $statement->execute($params);

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result[0] ?? null;
    }


    public function getLastInsertId()
    {
        return self::$connection->lastInsertId();
    }

    public function executeStatements($sqlStatements) {
        try {
            $this->getPdo()->exec($sqlStatements);
        } catch (PDOException $e) {
            die('Error executing SQL statements: ' . $e->getMessage());
        }
    }

    public function fetchColumn($query, $params = [])
    {
        try {
            $statement = $this->getPdo()->prepare($query);
            $statement->execute($params);

            return $statement->fetchColumn();
        } catch (PDOException $e) {
            die('Error exe cuting database query: ' . $e->getMessage());
        }
    }

    public function execute($query, $values = [])
    {
        try {
            $statement = $this->getPdo()->prepare($query);
            return $statement->execute($values);
        } catch (PDOException $e) {
            die('Execution failed: ' . $e->getMessage());
        }
    }


    public function query($query, $params = [])
    {
        try {
            $statement = $this->getPdo()->prepare($query);
            $statement->execute($params);

            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die('Error executing database query: ' . $e->getMessage());
        }
    }

}
