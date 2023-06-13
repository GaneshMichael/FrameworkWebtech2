<?php

namespace app\App\controllers;

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
                return $this->response->setStatusCode(200)->setContent('Success!');
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
        if ($request->isPost()) {
            $username = $request->getBody('username');
            $password = $request->getBody('password');

            // Validatie van de ingediende gegevens
            // ...

            $userModel = new UserModel();
            $user = $userModel->findByUsername($username);

            if ($user && password_verify($password, $user->password)) {
                $_SESSION['user_id'] = $user->id;
                $this->redirect('/dashboard'); // Vervang '/dashboard' met de gewenste URL
            } else {
                return $this->render('login', ['error' => 'Ongeldige inloggegevens']);
            }
        } else {
            return $this->render('login');
        }
    }
}

