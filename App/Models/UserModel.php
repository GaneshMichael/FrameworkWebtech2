<?php

namespace app\App\Models;

use app\App\core\Model;
use app\App\core\Database;

class UserModel extends Database\DatabaseModel
{
    public string $email = '';
    public string $password = '';

    public function validateCredentials(): bool
    {
        $user = self::findOne(['email' => $this->email]);

        if ($user && password_verify($this->password, $user['password'])) {
            // Inloggen is geslaagd
            $_SESSION['user'] = $user; // Sla de gebruikersinformatie op in de sessie
            return true;
        }

        return false;
    }

    public static function isLoggedIn(): bool
    {
        return isset($_SESSION['user']);
    }
}
