<?php
//
//namespace app\App\core;
//
//use app\core\PDO;
//use app\core\PDOException;
//
//class Database {
//    private $connection;
//
//    public function connect() {
//        $dsn = 'mysql:host=' . $_ENV['DB_HOST'] . ';dbname=' . $_ENV['DB_NAME'];
//        $username = $_ENV['DB_USERNAME'];
//        $password = $_ENV['DB_PASSWORD'];
//
//        try {
//            $this->connection = new PDO($dsn, $username, $password);
//            // Configure PDO options, if needed
//            // $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//        } catch (PDOException $e) {
//            die('Database connection failed: ' . $e->getMessage());
//        }
//    }
//}
//
