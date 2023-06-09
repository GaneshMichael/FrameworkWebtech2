<?php

namespace app\App\controllers;

use app\App\core\Controller;
use app\App\core\Request;
use app\App\Models\RegisterUser;

class AuthenticationController extends Controller
{
    public function login(): false|array|string
    {
        $this->chooseLayout('authentication');
        return $this->render('login');
    }

    public function register(Request $request): false|array|string
    {
        $registerUser = new RegisterUser();

        if($request->isPost()){
            $registerUser->loadData($request->getBody());

            if ($registerUser -> validate() && $registerUser->register()) {
                return 'Success!';
            }

            return $this->render('register', [
                'model' =>$registerUser
            ]);
        }

        $this->chooseLayout('authentication');
        return $this->render('register', [
            'model' =>$registerUser
        ]);
    }
}