<?php

namespace app\App\Middleware;

use app\App\core\App;
use app\App\Models\UserModel;

class AuthorizationMiddleware
{
    public function handle($request, $next)
    {
        if (!UserModel::isLoggedIn()) {

            header('Location: /login');
            exit;
        }

        return $next($request);
    }
}
