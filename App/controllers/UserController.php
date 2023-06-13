<?php

namespace app\App\Controllers;

use app\App\Models\Users;

class UserController {
    private $userModel;

    public function __construct() {
        $this->userModel = new Users();
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $username = $_POST['username'];
            $password = $_POST['password'];


            $user = $this->userModel->checkCredentials($username, $password);

            if ($user) {


                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['account_type'] = $user['account_type'];

                if ($user['account_type'] === 'admin') {
                } elseif ($user['account_type'] === 'teacher') {
                } elseif ($user['account_type'] === 'student') {
                }
            } else {

            }
        } else {

        }
    }

}
