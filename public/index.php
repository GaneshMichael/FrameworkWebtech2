<?php

use app\core\App;
use app\Routes\Routes;

require_once __DIR__ . '/../vendor/autoload.php';
$app = new App(dirname(__DIR__));

require_once __DIR__ . '/../Routes/Routes.php';

$app->run();