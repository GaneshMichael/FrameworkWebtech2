<?php

namespace app\controllers;

use app\core\App;
use app\core\Controller;
use app\core\Request;

class mainController extends Controller
{
    public function home() {
        $params = [
            'naam' => 'Michael'
        ];
        return $this->render('home', $params);
    }
    public function contact() {
        return $this->render('contact');
    }

    public function voortgang() {
        return $this->render('voortgang');
    }

    public function handleContact(Request $request) {
        $body = $request->getBody();
        echo '<pre>';
        var_dump($body);
        echo '</pre>';
        return 'Submitting data';
    }

}