<?php

use app\App\controllers\AuthenticationController;
use app\App\controllers\mainController;
use app\App\core\Application;
$app->router->get('/', [mainController::class, 'home']);
$app->router->get('/resultaten', [mainController::class, 'resultaten']);
$app->router->get('/voortgang', [mainController::class, 'voortgang']);
$app->router->get('/inschrijven', [mainController::class, 'inschrijven']);
$app->router->get('/instellingen', [mainController::class, 'instellingen']);
$app->router->get('/contact', [mainController::class, 'contact']);
$app->router->post('/contact', [mainController::class, 'handleContact']);
$app->router->get('/login', [AuthenticationController::class, 'login']);
$app->router->post('/login', [AuthenticationController::class, 'login']);
$app->router->get('/register', [AuthenticationController::class, 'register']);
$app->router->post('/register', [AuthenticationController::class, 'register']);
