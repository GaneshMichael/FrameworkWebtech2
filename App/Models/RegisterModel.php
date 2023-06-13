<?php
namespace app\App\Models;

use app\App\core\Model;
use app\App\core\Database;

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

        // Prepare the columns and values for insertion
        $columns = ['first_name', 'last_name', 'password', 'email'];
        $values = [$this->firstName, $this->lastName, $passwordHash, $this->email];

        // Execute the database query to create a new user
        $result = $this->db->insert('users', $columns, $values);

        // Return the result of the database query (e.g., the inserted user ID)
        if ($result) {
            return $result;
        } else {
            return false;
        }

    }

    public function validate(): bool
    {
        $isValid = true;

        // Validate first name
        if (empty($this->firstName)) {
            $this->addError('firstName', 'First name is required.');
            $isValid = false;
        }

        // Validate last name
        if (empty($this->lastName)) {
            $this->addError('lastName', 'Last name is required.');
            $isValid = false;
        }

        // Validate email
        if (empty($this->email)) {
            $this->addError('email', 'Email is required.');
            $isValid = false;
        } elseif (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $this->addError('email', 'Invalid email format.');
            $isValid = false;
        }

        // Validate password
        if (empty($this->password)) {
            $this->addError('password', 'Password is required.');
            $isValid = false;
        }

        // Validate confirm password
        if (empty($this->confirmPassword)) {
            $this->addError('confirmPassword', 'Confirm password is required.');
            $isValid = false;
        } elseif ($this->password !== $this->confirmPassword) {
            $this->addError('confirmPassword', 'Passwords do not match.');
            $isValid = false;
        }

        return $isValid;
    }


    public function userExists($firstName, $lastName, $email)
    {
        // Check if the user already exists based on first name, last name, or email
        $condition = 'first_name = :first_name OR last_name = :last_name OR email = :email';
        $params = [
            'first_name' => $firstName,
            'last_name' => $lastName,
            'email' => $email
        ];

        $result = $this->db->count('users', $condition, $params);

        return ($result > 0);
    }

    // Other methods required for the registration process
}
