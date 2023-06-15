<?php

namespace app\App\Models;
use app\App\core\Database;
use app\App\core\Model;

class UserModel extends Model
{
    public string $email = '';
    public string $password = '';
    protected $db;

    public function __construct() {
        $this->db = new Database();
        $this->db->connect();
    }

    public function checkCredentials($email, $password) { // checkCredentials is a method that checks if the user exists in the database
        $query = "SELECT * FROM users WHERE email = ?";
        $values = [$email, $password];
        $result = $this->db->query($query, $values);

        if ($result && password_verify($password, $result['password'])) {
            return $result;
        }
        return null;
    }
}
