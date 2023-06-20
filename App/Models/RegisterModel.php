<?php
namespace app\App\Models;

use app\App\core\Model;
use app\App\core\Database\DatabaseModel;

class RegisterModel extends Model
{
    public string $firstName = '';
    public string $lastName = '';
    public string $password = '';
    public string $email = '';
    public string $confirmPassword = '';

    public function register()
    {
        if ($this->userExists($this->firstName, $this->lastName, $this->email)) {
            return false;
        }

        $passwordHash = password_hash($this->password, PASSWORD_DEFAULT);

        $columns = ['first_name', 'last_name', 'password', 'email'];
        $values = [$this->firstName, $this->lastName, $passwordHash, $this->email];

        $result = (new \app\App\core\Database\DatabaseModel)->insert('users', $columns, $values);

        if ($result) {
            return $result;
        } else {
            return false;
        }

    }

    public function validate(): bool
    {
        $isValid = true;

        if (empty($this->firstName)) {
            $this->addError('firstName', 'First name is required.');
            $isValid = false;
        }

        if (empty($this->lastName)) {
            $this->addError('lastName', 'Last name is required.');
            $isValid = false;
        }

        if (empty($this->email)) {
            $this->addError('email', 'Email is required.');
            $isValid = false;
        } elseif (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $this->addError('email', 'Invalid email format.');
            $isValid = false;
        }

        if (empty($this->password)) {
            $this->addError('password', 'Password is required.');
            $isValid = false;
        }

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

        $result = DatabaseModel::count('users', $condition, $params);

        return ($result > 0);
    }
}
