<?php

namespace app\App\Controllers;

use app\App\Models\Users;

class UserController {
    private $userModel;

    public function __construct() {
        $this->userModel = new Users();
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Verkrijg de ingediende gegevens van het inlogformulier
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Controleer de inloggegevens
            $user = $this->userModel->checkCredentials($username, $password);

            if ($user) {
                // Inloggen gelukt
                // Stel gebruikerssessie in en redirect naar de juiste pagina
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['account_type'] = $user['account_type'];

                // Redirect naar de juiste pagina op basis van het accounttype
                if ($user['account_type'] === 'admin') {
                    // Redirect naar de admin-pagina
                } elseif ($user['account_type'] === 'teacher') {
                    // Redirect naar de teacher-pagina
                } elseif ($user['account_type'] === 'student') {
                    // Redirect naar de student-pagina
                }
            } else {
                // Inloggen mislukt
                // Toon een foutmelding aan de gebruiker
            }
        } else {
            // Toon het inlogformulier
            // Dit kan worden gedaan via een aparte view-template of door direct HTML uit te voeren
        }
    }

    // Andere methoden voor gebruikersacties (bijv. uitloggen, profielbewerking, etc.)
}
