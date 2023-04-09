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
        $registerModel = new RegisterModel();

        if($request->isPost()){
            $registerModel->loadData($request->getBody());

            echo '<pre>';
            var_dump($registerModel);
            echo '</pre>';

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