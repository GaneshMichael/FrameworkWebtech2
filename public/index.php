<?php

require_once __DIR__ . '/../vendor/autoload.php';
use app\core\Application;

$app = new Application(dirname(__Dir__));

$app->router->get('/', 'home');

$app->router->get('/resultaten', 'resultaten');

$app->router->get('/voortgang', 'voortgang');

$app->router->get('/inschrijven', 'inschrijven');

$app->run();