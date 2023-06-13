<?php

namespace app\App\Models;

use app\App\core\Database;
use app\App\core\Model;

class RegisterModel extends Model
{
    protected $db;
    public string $firstName = '';
    public string $lastName = '';
    public string $password = '';
    public string $email = '';
    public string $confirmPassword = '';

    public function __construct()
    {
        $this->db = new Database();
        $this->db->connect();
    }

    public function register()
    {
        // Check if the user already exists
        if ($this->userExists($this->firstName, $this->lastName, $this->email)) {
            return false;
        }

        // Generate a password hash
        $passwordHash = password_hash($this->password, PASSWORD_DEFAULT);

        // Execute the database query to create a new user
        $query = "INSERT INTO users (first_name, last_name, password, email) VALUES (?, ?, ?, ?)";
        $result = $this->db->execute($query, [$this->firstName, $this->lastName, $passwordHash, $this->email]);

        // Return the result of the database query (e.g., the inserted user ID)
        if ($result) {
            return $this->db->getLastInsertId();
        } else {
            return false;
        }
    }

    public function registerUser($firstName, $lastName, $password, $email)
    {
        // Check if the user already exists
        if ($this->userExists($firstName, $lastName, $email)) {
            return false;
        }

        // Generate a password hash
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        // Execute the database query to create a new user
        $query = "INSERT INTO users (first_name, last_name, password, email) VALUES (?, ?, ?, ?)";
        $result = $this->db->execute($query, [$firstName, $lastName, $passwordHash, $email]);

        // Return the result of the database query (e.g., the inserted user ID)
        if ($result) {
            return $this->db->getLastInsertId();
        } else {
            return false;
        }
    }

    public function userExists($firstName, $lastName, $email)
    {
        // Check if the user already exists based on first name, last name, or email
        $query = "SELECT COUNT(*) FROM users WHERE first_name = ? OR last_name = ? OR email = ?";
        $result = $this->db->fetchColumn($query, [$firstName, $lastName, $email]);

        return ($result > 0);
    }

    // Other methods required for the registration process
}
