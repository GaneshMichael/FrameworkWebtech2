<?php

namespace app\App\controllers;

use app\App\core\Controller;
use app\App\core\Request;

class MainController extends Controller
{
    public function contact() {
        return $this->render('contact');
    }

    public function voortgang() {
        return $this->render('voortgang');
    }

    public function resultaten() {
        return $this->render('resultaten');
    }

    public function handleContact(Request $request) {
        $body = $request->getBody();

        return 'Submitting data';
    }

}