<?php

namespace app\App\Models;
use app\App\core\Database;

class UserModel
{
    protected $db;

    public function __construct() {
        $this->db = new Database();
        $this->db->connect();
    }

    public function createUser($username, $password, $accountType) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO users (username, password, account_type) VALUES (?, ?, ?)";
        $values = [$username, $hashedPassword, $accountType];
        return $this->db->execute($query, $values);
    }

    public function checkCredentials($username, $password) {
        $query = "SELECT * FROM users WHERE username = ?";
        $values = [$username];
        $result = $this->db->query($query, $values);

        if ($result && password_verify($password, $result['password'])) {
            return $result;
        }

        return null;
    }

}