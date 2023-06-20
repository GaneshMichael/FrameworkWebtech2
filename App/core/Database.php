<?php

namespace app\App\core;

use PDO;
use PDOException;

class Database {
    private $connection;

    public function loadEnv()
    {
        $envFile = __DIR__ . '/../../.env';

        if (!file_exists($envFile)) {
            print($envFile);
            die('.env file not found');
        }

        $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            if (strpos($line, '=') !== false) {
                list($key, $value) = explode('=', $line, 2);
                $key = trim($key);
                $value = trim($value);

                $_ENV[$key] = $value;
            }
        }
    }

    public function executeStatements($sqlStatements) {
        try {
            $this->connection->exec($sqlStatements);
        } catch (PDOException $e) {
            die('Error executing SQL statements: ' . $e->getMessage());
        }
    }

    public function fetchColumn($query, $params = [])
    {
        try {
            $statement = $this->connection->prepare($query);
            $statement->execute($params);

            return $statement->fetchColumn();
        } catch (PDOException $e) {
            die('Error exe cuting database query: ' . $e->getMessage());
        }
    }



    public function execute($query, $values = [])
    {
        try {
            $statement = $this->connection->prepare($query);
            return $statement->execute($values);
        } catch (PDOException $e) {
            die('Execution failed: ' . $e->getMessage());
        }
    }


    public function query($query, $params = [])
    {
        try {
            $statement = $this->connection->prepare($query);
            $statement->execute($params);

            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die('Error executing database query: ' . $e->getMessage());
        }
    }

        public function getLastInsertId()
    {
        return $this->connection->lastInsertId();
    }
}
