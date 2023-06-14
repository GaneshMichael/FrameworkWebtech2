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

    public function checkCredentials($firstName, $password) { // checkCredentials is a method that checks if the user exists in the database
        $query = "SELECT * FROM users WHERE first_name = ?";
        $values = [$firstName];
        $result = $this->db->query($query, $values);

        if ($result && password_verify($password, $result['password'])) {
            return $result;
        }
        return null;
    }
}
