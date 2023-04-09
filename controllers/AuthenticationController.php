<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;

class AuthenticationController extends Controller
{
    public function login(): false|array|string
    {
        $this->chooseLayout('authentication');
        return $this->render('login');
    }

    public function register(Request $request): false|array|string
    {
        if($request->isPost()){
            $registerModel = new RegisterModel();
            return 'Submitting data';
        }

        $this->chooseLayout('authentication');
        return $this->render('register');
    }
}