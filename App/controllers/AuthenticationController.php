<?php

namespace app\App\controllers;

use app\App\core\Response;
use app\App\core\Controller;
use app\App\core\Request;
use app\App\Models\RegisterModel;
use app\App\Models\UserModel;

class AuthenticationController extends Controller
{

    public Response $response;

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
            $email = $request->getBody('email');
            $password = $request->getBody('password');

            $userModel = new UserModel();
            $user = $userModel->checkCredentials($email, $password);

            if ($user && password_verify($password, $user->password)) {
                $_SESSION['user_id'] = $user->id;
                $this->render('/dashboard');
            } else {
                return $this->response->redirect('login', ['error' => 'Ongeldige inloggegevens']);
            }
        } else {
            return $this->render('login');
        }
    }
}

