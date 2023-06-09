<?php

use app\App\core\App;
use app\App\Routes\Routes;
//use app\App\core\Database;

require_once __DIR__ . '/../vendor/autoload.php';
$app = new App(dirname(__DIR__));

require_once __DIR__ . '/../App/Routes/Routes.php';

// Verbinding maken met de database
//$database = new Database(
//    $_ENV['DB_HOST'],
//    $_ENV['DB_PORT'],
//    $_ENV['DB_NAME'],
//    $_ENV['DB_USERNAME'],
//    $_ENV['DB_PASSWORD']
//);
//$database->connect();

//$app->run();
