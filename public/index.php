<?php

use app\controllers\AuthenticationController;
use app\controllers\mainController;
use app\core\App;

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$config = [
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD'],
    ]
];

$app = new App(dirname(__Dir__), $config);

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

$app->run();