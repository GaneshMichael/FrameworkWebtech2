<?php

namespace app\App\core;

use PDO;
use PDOException;

class Database {
    private $connection;

    private function loadEnv()
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

                // Optioneel: Omring de waarde met enkele of dubbele aanhalingstekens om speciale tekens te ontsnappen
                // $value = trim($value, "'\"");

                $_ENV[$key] = $value;
            }
        }
    }

    public function connect() {
        // Laden van .env bestand
        $this->loadEnv();

        $dsn = 'mysql:host=' . $_ENV['DB_HOST'] . ';dbname=' . $_ENV['DB_NAME'];
        $username = $_ENV['DB_USERNAME'];
        $password = $_ENV['DB_PASSWORD'];

        try {
            $this->connection = new PDO($dsn, $username, $password);

        } catch (PDOException $e) {
            die('Database connection failed: ' . $e->getMessage());
        }
    }

    public function executeStatements($sqlStatements) {
        try {
            $this->connection->exec($sqlStatements);
        } catch (PDOException $e) {
            die('Error executing SQL statements: ' . $e->getMessage());
        }
    }
}
