<?php
namespace app\App\Models;

use app\App\core\Model;
use app\App\core\Database\DatabaseModel;

class RegisterModel extends DatabaseModel
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
