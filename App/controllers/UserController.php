<?php

namespace app\App\Controllers;

use app\App\Models\UserModel;

class UserController {
    private $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    public function authenticate($firstName, $password)
    {
        $query = "SELECT * FROM users WHERE first_name = ?";
        $values = [$firstName];
        $result = $this->db->query($query, $values);

        if ($result && password_verify($password, $result['password'])) {
            return $result;
        }

        return null;
    }

}
