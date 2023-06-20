<?php

use app\App\core\App;
use app\App\Routes\Routes;
use app\App\core\Database;
use app\App\core\Database\DatabaseModel;

require_once __DIR__ . '/../vendor/autoload.php';
$app = new App(dirname(__DIR__));
require_once __DIR__ . '/../App/Routes/Routes.php';

$app->run();