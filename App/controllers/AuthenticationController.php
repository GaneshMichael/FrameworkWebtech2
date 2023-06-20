<?php

namespace app\App\controllers;

use app\App\core\App;
use app\App\core\Controller;
use app\App\core\Request;
use app\App\Models\RegisterModel;
use app\App\Models\UserModel;

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
                App::$app->setUser($userModel);
                return $this->render('/home');
            }

            $this->chooseLayout('authentication');
            return $this->render('login', [
                'model' => $userModel
            ]);
        } else {
            $this->chooseLayout('authentication');
            return $this->render('login', [
                'model' => $userModel
            ]);
        }
    }
    public function logout(Request $request)
    {
        $userModel = new UserModel();
        $userModel->logout();
        return $this->render('/login');
    }
}

