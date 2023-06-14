<?php

namespace app\App\Middleware;

use app\App\core\App;
use app\App\Models\UserModel;

class AuthorizationMiddleware
{
    public function handle($request, $next)
    {
        // Controleer of de gebruiker is geautoriseerd
        if (!UserModel::isLoggedIn()) {
            // Gebruiker is niet ingelogd, stuur ze naar de inlogpagina
            header('Location: /login');
            exit;
        }

        // Gebruiker is geautoriseerd, ga verder met het verwerken van het verzoek
        return $next($request);
    }
}
