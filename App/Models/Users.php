<?php

namespace app\App\Models;
use app\App\core\Database;

class Users
{
    protected $db;

    public function __construct() {
        $this->db = new Database();
        $this->db->connect();
    }

    public function createUser($firstName, $lastName, $password, $accountType) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO users (first_name, last_name, password, account_type) VALUES (?, ?, ?, ?)";
        $values = [$firstName, $lastName, $hashedPassword, $accountType];
        return $this->db->execute($query, $values);
    }

    public function checkCredentials($firstName, $password) {
        $query = "SELECT * FROM users WHERE first_name = ?";
        $values = [$firstName];
        $result = $this->db->query($query, $values);

        if ($result && password_verify($password, $result['password'])) {
            return $result;
        }

        return null;
    }

}
