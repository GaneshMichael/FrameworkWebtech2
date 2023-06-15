<?php

namespace app\App\controllers;

use app\App\core\Response;
use app\App\core\Controller;
use app\App\core\Request;
use app\App\Models\RegisterModel;
use app\App\Models\UserModel;
use app\App\Models\LoginModel;

class AuthenticationController extends Controller
{

    public Response $response;

    public function register(Request $request)
    {
        $registerModel = new RegisterModel();

        if ($request->isPost()) {
            $registerModel->loadData($request->getBody());

            if ($registerModel->validate() && $registerModel->register()) {
                return 'Success';
            }

            return $this->render('register', [
                'model' => $registerModel
            ]);
        }

        $this->chooseLayout('authentication');
        return $this->render('register', [
            'model' => $registerModel
        ]);
    }
    public function login(Request $request)
    {
        $loginModel = new LoginModel();

        if ($request->isPost()) {
            $loginModel->loadData($request->getBody());

            if ($loginModel->validate() && $loginModel->login()) {
                return 'Success';
            }

            return $this->render('login', [
                'model' => $loginModel
            ]);
        }

        $this->chooseLayout('authentication');
        return $this->render('login', [
            'model' => $loginModel
        ]);
    }

}

