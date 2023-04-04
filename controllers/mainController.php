<?php

namespace app\controllers;
use app\core\Application;

class siteController
{
    public function home() {
        $params = [
            'naam' => 'Michael'
        ];
        return Application::$app->router->renderView('home', $params);
    }
    public function contact() {
        return Application::$app->router->renderView('contact');
    }
    public function handleContact() {
        return 'Submitting data';
    }

}