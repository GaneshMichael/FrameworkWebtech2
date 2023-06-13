<?php

namespace app\App\controllers;

use app\App\core\Controller;
class HomeController extends Controller
{
    public function home() {
        $params = [
            'naam' => 'Michael'
        ];
        return $this->render('home', $params);
    }

}