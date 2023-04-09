<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\models\RegisterModel;

class AuthenticationController extends Controller
{
    public function login(): false|array|string
    {
        $this->chooseLayout('authentication');
        return $this->render('login');
    }

    public function register(Request $request): false|array|string
    {
        $errors =[];
        if($request->isPost()){
            $registerModel = new RegisterModel();
            $firstname = $request->getBody()['firstname'];
            if (!$firstname){
                $errors['firstname'] = 'This field is required';
            }
            return 'Submitting data';
        }

        $this->chooseLayout('authentication');
        return $this->render('register', [
            'errors' => $errors
        ]);
    }
}