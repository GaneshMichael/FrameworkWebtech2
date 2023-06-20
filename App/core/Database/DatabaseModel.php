<?php

namespace app\App\core\Database;

use PDO;
use PDOException;
use app\App\core\Database;

class DatabaseModel
{
    public static PDO $connection;
    public Database $Database;

    public function __construct()
    {
        $this->Database = new Database();
        $this->connect();
    }

    public function connect()
    {
        $this->Database->loadEnv();

        $dsn = 'mysql:host=' . $_ENV['DB_HOST'] . ';dbname=' . $_ENV['DB_NAME'];
        $username = $_ENV['DB_USERNAME'];
        $password = $_ENV['DB_PASSWORD'];

        try {
            self::$connection = new PDO($dsn, $username, $password);
        } catch (PDOException $e) {
            die('Database connection failed: ' . $e->getMessage());
        }
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

    public function getLastInsertId()
    {
        return self::$connection->lastInsertId();
    }
}
