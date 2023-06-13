<?php

namespace app\App\Models;

class LoginModel 
{
    public function login($username, $password)
    {
        $userModel = new UserModel();
        $user = $userModel->findByUsername($username);

        if ($user && password_verify($password, $user->password)) {
            $_SESSION['user_id'] = $user->id;
            return true;
        } else {
            return false;
        }
    }

}