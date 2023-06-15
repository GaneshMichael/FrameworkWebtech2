<?php

namespace app\App\Models;

use app\App\core\Database;
use app\App\core\Model;

class LoginModel extends Model
{
    const RULE_REQUIRED = 'required';
    public string $email = '';
    public string $password = '';

    public function login()
    {
        $user = $this->findOne(['email' => $this->email]);
        if ($user && password_verify($this->password, $user['password'])) {
            return true;
        }
        return false;
    }



}