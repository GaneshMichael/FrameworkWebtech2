<?php

namespace app\App\controllers;

use app\App\core\Controller;
class DashboardController extends Controller
{
    public function dashboard() {
        $params = [
        ];
        return $this->render('dashboard', $params);
    }

}