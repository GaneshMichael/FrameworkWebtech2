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
        $userModel = new UserModel();

        if ($request->isPost()) {
            $userModel->loadData($request->getBody());

            if ($userModel->validateCredentials()) {
                return 'Success';
            }

            return $this->render('login', [
                'model' => $userModel
            ]);
        }
    }
}

