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

    public function login(ServerRequestInterface $request, ResponseInterface $response)
    {
        if ($request->getMethod() === 'POST') {
            $email = $request->getParsedBody()['email'] ?? '';
            $password = $request->getParsedBody()['password'] ?? '';

            // Controleer of beide velden zijn ingevuld
            if (empty($email) || empty($password)) {
                // Toon een foutmelding of doorverwijzen naar de inlogpagina
                return $response->withRedirect('/login');
            }

            // Verifieer de inloggegevens met behulp van het UserModel
            $userModel = new UserModel();
            $userModel->email = $email;
            $userModel->password = $password;

            if ($userModel->validateCredentials()) {
                // Inloggen gelukt, voer de gewenste actie uit
                return $response->withRedirect('/dashboard');
            } else {
                // Ongeldige inloggegevens, toon een foutmelding of doorverwijzen naar de inlogpagina
                return $response->withRedirect('/login');
            }
        } else {
            // Toon het inlogformulier
            return $response->getBody()->write('Login Form');
        }
    }
}

