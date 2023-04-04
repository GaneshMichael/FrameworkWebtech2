<?php

require_once __DIR__ . '/../vendor/autoload.php';

use app\controllers\mainController;
use app\core\Application;

$app = new Application(dirname(__Dir__));

$app->router->get('/', [mainController::class, 'home']);

$app->router->get('/resultaten', 'resultaten');

$app->router->get('/voortgang', 'voortgang');

$app->router->get('/inschrijven', 'inschrijven');

$app->router->get('/instellingen', 'instellingen');

$app->router->get('/contact', [mainController::class, 'contact']);

$app->router->post('/contact', [mainController::class, 'handleContact']);

$app->run();