<?php

use app\App\controllers\AuthenticationController;
use app\App\controllers\MainController;
use app\App\core\Application;

$app->router->get('/', [\app\App\controllers\HomeController::class, 'home']);
$app->router->get('/resultaten', [MainController::class, 'resultaten']);
$app->router->get('/voortgang', [MainController::class, 'voortgang']);
$app->router->get('/inschrijven', [MainController::class, 'inschrijven']);
$app->router->get('/instellingen', [MainController::class, 'instellingen']);
$app->router->get('/contact', [MainController::class, 'contact']);
$app->router->post('/contact', [MainController::class, 'handleContact']);
$app->router->get('/login', [AuthenticationController::class, 'login']);
$app->router->post('/login', [AuthenticationController::class, 'login']);
$app->router->get('/register', [AuthenticationController::class, 'register']);
$app->router->post('/register', [AuthenticationController::class, 'register']);

