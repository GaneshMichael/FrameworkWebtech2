<?php

namespace app\App\controllers;

use app\App\core\Controller;
class DashboardController extends Controller
{
    public function dashboard() {
        $params = [
            'naam' => 'Michael'
        ];
        return $this->render('dashboard', $params);
    }

}