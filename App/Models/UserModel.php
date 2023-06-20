<?php

namespace app\App\Models;

use app\App\core\Database;

class UserModel extends Database\DatabaseModel
{
    public string $email = '';
    public string $password = '';

    public function validateCredentials(): bool
    {
        $user = self::findOne(['email' => $this->email]);

        if ($user && password_verify($this->password, $user['password'])) {

            $_SESSION['user'] = $user;
            return true;
        }

        return false;
    }

    public function logout()
    {
        unset($_SESSION['user']);
    }

    public static function isLoggedIn(): bool
    {
        return isset($_SESSION['user']);
    }

    public static function isLoggedOut(): bool
    {
        return !isset($_SESSION['user']);
    }
}
