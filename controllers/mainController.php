<?php

namespace app\controllers;

use app\core\Controller;

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
    public function handleContact() {
        return 'Submitting data';
    }

}