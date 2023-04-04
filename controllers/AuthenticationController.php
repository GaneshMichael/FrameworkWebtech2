<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;

class AuthenticationController extends Controller
{
    public function login()
    {
        return $this->render('login');
    }

    public function register(Request $request)
    {
        if($request->isPost()){
            return 'Submitting data';
        }
        return $this->render('register');
    }
}