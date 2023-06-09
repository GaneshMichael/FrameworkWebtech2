<?php

namespace app\App\controllers;

use app\App\core\Controller;
use app\App\core\Request;
use app\App\Models\RegisterModel;

class AuthenticationController extends Controller
{
    public function login(): false|array|string
    {
        $this->chooseLayout('authentication');
        return $this->render('login');
    }

    public function register(Request $request): false|array|string
    {
        $registerModel = new RegisterModel();

        if($request->isPost()){
            $registerModel->loadData($request->getBody());

            if ($registerModel -> validate() && $registerModel->register()) {
                return 'Success!';
            }

            return $this->render('register', [
                'model' =>$registerModel
            ]);
        }

        $this->chooseLayout('authentication');
        return $this->render('register', [
            'model' =>$registerModel
        ]);
    }
}